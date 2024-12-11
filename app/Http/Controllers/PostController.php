<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
        */

        return view('posts.index', ['posts' => DB::table('posts')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view("posts.create", ["tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //we get the user who is posting so we know who to attribute the post to
        $userId = Auth::user()->id;

        //dd($request->image);
        $validData = $request->validate([
            "title" => "required|max:255",
            "text" => "required|max:4500",
            "image" => "image",
        ]); 

        //here store the supplied image and get the file path if an image has been supplied
        $postHasImage;
        if($request->file("image") != null) {
        $imagePath =  $request->file("image")->store("images", "public");
        $postHasImage = true;
        }    

        //creating the post in the database here
        $p = new Post;
        $p->image_location = $imagePath;
        $p->contains_image = $postHasImage;
        $p->post_title = $validData["title"];
        $p->post_text = $validData["text"];
        $p->user_id = $userId;
        $p->save();

        $tags = $request["tag"];
        if($tags != null) {
            foreach($tags as $tag) {
                $p->tags()->attach($tag);
            }
        }

        session()->flash("message", "your post was created!");
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $tags = $post->tags;
        $comments = $post->comments;
        return view("posts.show", ["post" => $post, "tags" => $tags, "comments" => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //allow users to edit posts
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view("posts.edit", ["tags" => $tags, "post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $op = $post->user_id;
        $loggedInUser = Auth::user();
        $currentUserRole = $loggedInUser->role->role_role;
        $canEdit = false;

        
        if(($currentUserRole == "admin") || ($loggedInUser->id == $op)) {
            $canEdit = true;
        }
        if($canEdit) {

        //we want the user to be able to only edit parts of a post so we have to fill in the bits they leave empty for them
        $inputTitle = $request->title;
        $inputText = $request->text;
        
        if($inputTitle == null) {
            $request->request->add(["title" => ($post->post_title)]);
        }

        if($inputText == null) {
            $request->request->add(["text" => ($post->post_text)]);
        }

        $validData = $request->validate([
            "title" => "required|max:255",
            "text" => "required|max:4500",
        ]); 

          //here we assume the post has no image for now
        $image = null;
        
           //checks if the post has an image and assigns the boolean value
        $postHasImage = true;

        if($image == null) {
            $postHasImage = false;
        }

        $post->image_location = $image;
        $post->contains_image = $postHasImage;
        $post->post_title = $validData["title"];
        $post->post_text = $validData["text"];
        //dont want to change the op if someone else (eg an admin) edits
        $post->user_id = $op;
        $post->save();

        $tags = $request["tag"];
        if($tags != null) {
            $post->tags()->detach();
            foreach($tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        session()->flash("message", "your post was updated!");

        } else {
        session()->flash("message", "you do not have permission to edit this post!");
        }
        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\RepliedTo;
use Auth;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $type)
    {
        $commentableId;
        $cancelId = 1;
        //gets the polymorphic type of the comment being made and also gets the post id to return to if the user uses the cancel button
        if($type == "App\Models\Post"){
            $post = Post::findOrFail($id);
            $commentableId = $post->id;
            $cancelId = $commentableId;
        } elseif($type == "App\Models\Comment") {
            $comment = Comment::findOrFail($id);
            $commentableId = $comment->id;
            $post = Post::findOrFail($comment->commentable_id);
            $cancelId = $post->id;
        }

        return view("comments.create", ["commentableId" => $commentableId, "type" => $type, "cancelId" => $cancelId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //we get the user who is commenting so we know who to attribute the comment to
        $userId = Auth::user()->id;

        //here we assume the comment has no image for now
        $image = null;

        //checks if the comment has an image and assigns the boolean value
        $commentHasImage = true;
        if($image == null) {
            $commentHasImage = false;
        }

        $validData = $request->validate([
            "text" => "required|max:1000",
        ]); 

        //get the id of the post the comment is under
        $requestId = $request->integer("id");

        //creating the comment in the database here
        $c = new Comment;
        $c->image_location = $image;
        $c->contains_image = $commentHasImage;
        $c->comment_text = $validData["text"];
        $c->user_id = $userId;
        $c->commentable_id = $requestId;
        $c->commentable_type = $request->string("type");
        $c->save();

        //now we can add a notification
        
        $post = Post::findOrFail($request->returnId);
        $postOP = $post->user;
        $postOP->notify(new RepliedTo());

        //we still need to add images to comments
        session()->flash("message", "your comment was created!");
        return redirect()->route("posts.show",["id" => $request->returnId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //allow users to edit comments
        $comment = Comment::findOrFail($id);
        return view("comments.edit", ["comment"=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $op = $comment->user_id;
        $loggedInUser = Auth::user();
        $currentUserRole = $loggedInUser->role->role_role;
        $canEdit = false;

        if(($currentUserRole == "admin") || ($loggedInUser->id == $op)) {
            $canEdit = true;
        }

        if($canEdit) {
        //we want the user to be able to only edit parts of a comment if we add more fields so we have to fill in the bits they leave empty for them
        $inputText = $request->text;

        if($inputText == null) {
            $request->request->add(["text" => ($comment->comment_text)]);
        }

        $validData = $request->validate([
            "text" => "required|max:1000",
        ]); 

          //here we assume the post has no image for now
        $image = null;
        
           //checks if the post has an image and assigns the boolean value
        $commentHasImage = true;

        if($image == null) {
            $commentHasImage = false;
        }

        $comment->image_location = $image;
        $comment->contains_image = $commentHasImage;
        $comment->comment_text = $validData["text"];
        //dont want to change the op if someone else (eg an admin) edits
        $comment->save();

        $tags = $request["tag"];
        if($tags != null) {
            $post->tags()->detach();
            foreach($tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        session()->flash("message", "your comment was updated!");

        } else {
        session()->flash("message", "you do not have permission to edit this post!");
        }
        return redirect()->route("posts.show", ["id" => $comment->post_id]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //we get the user who is posting so we know who to attribute the post to
        $userId = Auth::user()->id;

        //here we assume the post has no image for now
        $image = null;

        //checks if the post has an image and assigns the boolean value
        $postHasImage = true;
        if($image == null) {
            $postHasImage = false;
        }

        $validData = $request->validate([
            "title" => "required|max:255",
            "text" => "required|max:4500",
        ]); 

        //creating the post in the database here
        $p = new Post;
        $p->image_location = $image;
        $p->contains_image = $postHasImage;
        $p->post_title = $validData["title"];
        $p->post_text = $validData["text"];
        $p->user_id = $userId;
        $p->save();

        //we still need to add tags and images to posts
        session()->flash("message", "your post was created!");
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

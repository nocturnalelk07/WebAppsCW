<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
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
    public function create($id)
    {
        $postId = Post::findOrFail($id)->id;
        return view("comments.create", ["postId" => $postId]);
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
            "text" => "required|max:4500",
        ]); 

        //get the id of the post the comment is under
        $postId = null;

        //creating the comment in the database here
        $p = new Comment;
        $p->image_location = $image;
        $p->contains_image = $commentHasImage;
        $p->comment_title = $validData["title"];
        $p->comment_text = $validData["text"];
        $p->user_id = $userId;
        $p->post_id = $postId;
        $p->save();

        //we still need to add tags and images to comments
        session()->flash("message", "your comment was created!");
        return redirect()->route("post.show",["postId" => $postId]);
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

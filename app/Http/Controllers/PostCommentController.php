<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post, Request $request)
    {

        // Validate the request
        request()->validate([
            'body' => 'required'
        ]);

        // Add a comment
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request()->input('body')
        ]);

        return back();
    }
}

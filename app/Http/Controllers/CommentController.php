<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:posts,id',
        'content' => 'required',
    ]);

    Comment::create([
        'post_id' => $request->post_id,
        'user_id' => Auth::id(),
        'content' => $request->content,
    ]);

    return redirect()->route('posts.show', ['slug' => Post::find($request->post_id)->slug]);
}
}
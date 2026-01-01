<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->published()->firstOrFail();
        
        return view('posts.show', compact('post'));
    }
    
    public function storeComment(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->published()->firstOrFail();
        
        $request->validate([
            'author_name' => 'required|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required',
        ]);
        
        Comment::create([
            'post_id' => $post->id,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'content' => $request->content,
        ]);
        
        return redirect()->route('posts.show', $slug)
            ->with('success', 'Comment added successfully.');
    }
}
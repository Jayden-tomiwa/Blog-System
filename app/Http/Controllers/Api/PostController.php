<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $post->load('comments')
        ]);
    }
    
    public function storeComment(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
        
        $request->validate([
            'author_name' => 'required|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required',
        ]);
        
        $comment = Comment::create([
            'post_id' => $post->id,
            'author_name' => $request->author_name,
            'author_email' => $request->author_email,
            'content' => $request->content,
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully',
            'data' => $comment
        ]);
    }
    
    public function getComments($slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }
        
        $comments = $post->comments()->latest()->get();
        
        return response()->json([
            'success' => true,
            'data' => $comments
        ]);
    }
}
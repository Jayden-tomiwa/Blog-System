<?php

// app/Http/Controllers/Admin/PostController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isAdmin()) {
                abort(403, 'Unauthorized access.');
            }
            return $next($request);
        });
    }
    
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }
    
    public function create()
    {
        return view('admin.posts.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'status' => $request->status ?? 'draft',
            'published_at' => $request->status === 'published' ? now() : null,
        ]);
        
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }
    
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        
        return view('admin.posts.edit', compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'status' => $request->status ?? $post->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ]);
        
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }
    
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }
        
        $post->delete();
        
        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
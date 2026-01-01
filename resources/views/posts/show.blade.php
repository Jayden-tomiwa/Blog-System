<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('title', $post->title)

@section('content')
<article class="card">
    <h1 class="post-title">{{ $post->title }}</h1>
    
    <div class="post-meta">
        Published on {{ $post->published_at->format('F d, Y') }} | 
        {{ $post->comments->count() }} comments
    </div>
    
    <div class="post-content">
        {!! nl2br(e($post->content)) !!}
    </div>
</article>

<!-- Comments Section -->
<section class="card" style="margin-top: 2rem;">
    <h2 style="margin-bottom: 1.5rem;">Comments ({{ $post->comments->count() }})</h2>
    
    <!-- Comment Form -->
    <form action="{{ route('comments.store', $post->slug) }}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        <h3 style="margin-bottom: 1rem;">Add a Comment</h3>
        
        <div class="form-group">
            <input type="text" name="author_name" class="form-control" 
                   placeholder="Your Name" required>
        </div>
        
        <div class="form-group">
            <input type="email" name="author_email" class="form-control" 
                   placeholder="Your Email" required>
        </div>
        
        <div class="form-group">
            <textarea name="content" class="form-control" 
                      rows="4" placeholder="Your Comment" required></textarea>
        </div>
        
        <button type="submit" class="btn">Submit Comment</button>
    </form>
    
    <!-- Comments List -->
    @foreach($post->comments as $comment)
    <div style="padding: 1rem; border-bottom: 1px solid #e2e8f0; margin-bottom: 1rem;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
            <strong>{{ $comment->author_name }}</strong>
            <span style="color: #718096; font-size: 0.9rem;">
                {{ $comment->created_at->format('M d, Y') }}
            </span>
        </div>
        <p style="color: #4a5568;">{{ $comment->content }}</p>
    </div>
    @endforeach
    
    @if($post->comments->isEmpty())
    <p style="text-align: center; color: #718096;">No comments yet. Be the first to comment!</p>
    @endif
</section>
@endsection
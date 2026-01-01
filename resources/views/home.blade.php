<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="text-align: center; margin-bottom: 3rem;">
    <h1 style="font-size: 2.5rem; color: #2d3748;">Welcome to JAYDEN'S Blog</h1>
    <p style="font-size: 1.2rem; color: #718096;">Latest articles and insights</p>
</div>

<div class="post-grid">
    @foreach($posts as $post)
    <article class="post-card">
        <div class="post-card-content">
            <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem;">
                <a href="{{ route('posts.show', $post->slug) }}" 
                   style="color: #2d3748; text-decoration: none;">
                    {{ $post->title }}
                </a>
            </h3>
            <div style="color: #718096; font-size: 0.9rem; margin-bottom: 1rem;">
                Published on {{ $post->published_at->format('F d, Y') }}
            </div>
            <p style="color: #4a5568;">
                {{ Str::limit(strip_tags($post->content), 150) }}
            </p>
            <a href="{{ route('posts.show', $post->slug) }}" 
               class="btn" 
               style="margin-top: 1rem; display: inline-block;">
                Read More
            </a>
        </div>
    </article>
    @endforeach
</div>

<div style="margin-top: 2rem; text-align: center;">
    {{ $posts->links() }}
</div>
@endsection

@extends('layouts.app')

@section('title', 'Manage Posts')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1>Manage Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create New Post</a>
</div>

<div class="card">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid #e2e8f0;">
                <th style="text-align: left; padding: 0.75rem;">Title</th>
                <th style="text-align: left; padding: 0.75rem;">Status</th>
                <th style="text-align: left; padding: 0.75rem;">Date</th>
                <th style="text-align: left; padding: 0.75rem;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr style="border-bottom: 1px solid #e2e8f0;">
                <td style="padding: 0.75rem;">
                    <a href="{{ route('posts.show', $post->slug) }}" 
                       style="color: #667eea; text-decoration: none;">
                        {{ $post->title }}
                    </a>
                </td>
                <td style="padding: 0.75rem;">
                    <span style="padding: 0.25rem 0.5rem; border-radius: 4px; 
                          background: {{ $post->status === 'published' ? '#c6f6d5' : '#fed7d7' }};
                          color: {{ $post->status === 'published' ? '#22543d' : '#742a2a' }};
                          font-size: 0.9rem;">
                        {{ ucfirst($post->status) }}
                    </span>
                </td>
                <td style="padding: 0.75rem;">
                    {{ $post->created_at->format('M d, Y') }}
                </td>
                <td style="padding: 0.75rem;">
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('posts.show', $post->slug) }}" 
                           class="btn" 
                           style="padding: 0.25rem 0.5rem; font-size: 0.9rem;">
                            View
                        </a>
                        <a href="{{ route('admin.posts.edit', $post) }}" 
                           class="btn" 
                           style="padding: 0.25rem 0.5rem; font-size: 0.9rem;">
                            Edit
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this post?')"
                                    style="padding: 0.25rem 0.5rem; font-size: 0.9rem;">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            
            @if($posts->isEmpty())
            <tr>
                <td colspan="4" style="text-align: center; padding: 2rem; color: #718096;">
                    No posts yet. <a href="{{ route('admin.posts.create') }}">Create your first post</a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div style="margin-top: 2rem;">
    <a href="{{ route('admin.dashboard') }}" class="btn">&larr; Back to Dashboard</a>
</div>
@endsection
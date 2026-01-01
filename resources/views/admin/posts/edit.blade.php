<!-- resources/views/admin/posts/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="card">
    <h1 style="margin-bottom: 2rem;">Edit Post</h1>
    
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $post->title) }}" required autofocus>
            @error('title')
                <div style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" 
                      rows="10" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
            @error('status')
                <div style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-success">
                Update Post
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn">Cancel</a>
            <a href="{{ route('posts.show', $post->slug) }}" 
               class="btn" 
               target="_blank">
                View Post
            </a>
        </div>
    </form>
</div>
@endsection 
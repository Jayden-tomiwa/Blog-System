<!-- resources/views/admin/posts/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<div class="card">
    <h1 style="margin-bottom: 2rem;">{{ isset($post) ? 'Edit Post' : 'Create New Post' }}</h1>
    
    <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" 
          method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $post->title ?? '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" 
                      rows="10" required>{{ old('content', $post->content ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="draft" {{ isset($post) && $post->status === 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ isset($post) && $post->status === 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-success">
                {{ isset($post) ? 'Update Post' : 'Create Post' }}
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn">Cancel</a>
        </div>
    </form>
</div>
@endsection
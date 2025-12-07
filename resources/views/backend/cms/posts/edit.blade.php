@extends('backend.layouts.app')

@section('title','Create Post')

@section('content')
<div class="container-fluid">
    <h3>Edit Post</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- none --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}"{{ old('category_id', $post->category_id) == $c->id ? ' selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6">{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group">
            <label>Excerpt</label>
            <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>
        <div class="form-group">
            <label>Featured Image</label>
            <input type="file" name="featured_image" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" name="published" class="form-check-input" id="published" {{ old('published', $post->published) ? ' checked' : '' }}>
            <label for="published" class="form-check-label">Published</label>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection

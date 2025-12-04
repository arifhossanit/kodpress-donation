@extends('backend.layouts.app')

@section('title','Create Post')

@section('content')
<div class="container-fluid">
    <h3>Create Post</h3>
    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- none --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>
        <div class="form-check">
            <input type="checkbox" name="published" class="form-check-input" id="published">
            <label for="published" class="form-check-label">Published</label>
        </div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection

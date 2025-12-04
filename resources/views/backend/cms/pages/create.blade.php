@extends('backend.layouts.app')

@section('title','Create Page')

@section('content')
<div class="container-fluid">
    <h3>Create Page</h3>
    <form action="{{ route('admin.pages.store') }}" method="post">
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
            <label>Content (fallback)</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

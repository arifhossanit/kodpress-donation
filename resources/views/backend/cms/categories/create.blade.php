@extends('backend.layouts.app')

@section('title','Create Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h3>Create Category</h3>
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                        <option value="post">Post</option>
                        <option value="gallery">Gallery</option>
                    </select>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection

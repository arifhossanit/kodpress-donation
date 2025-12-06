@extends('backend.layouts.app')

@section('title','Create Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <h3>Create Category</h3>
            <form action="{{ route('admin.categories.update', $category) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}">
                </div>
                <button class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('backend.layouts.app')

@section('title','Create Gallery')

@section('content')
<div class="container-fluid">
    <h3>Create Gallery</h3>
    <form action="{{ route('admin.galleries.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

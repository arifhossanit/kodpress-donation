@extends('backend.layouts.app')

@section('title','Edit Gallery')

@section('content')
<div class="container-fluid">
    <h3>Edit Gallery: {{ $gallery->name }}</h3>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $gallery->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $gallery->slug) }}" class="form-control @error('slug') is-invalid @enderror">
            @error('slug')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $gallery->description) }}</textarea>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

@extends('backend.layouts.app')

@section('title','Banners')

@section('content')
<div class="container-fluid">
    <h3>Banners / Sliders</h3>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Create Banner</a>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-secondary ms-2">(Uses file uploader)</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($banners as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->title }}</td>
                <td><img src="{{ asset($b->image_path) }}" alt="picture" style="max-width: 100px; max-height: 50px;"></td>
                <td>{{ $b->active ? 'Yes' : 'No' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.banners.destroy',$b) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

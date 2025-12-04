@extends('backend.layouts.app')

@section('title','Posts')

@section('content')
<div class="container-fluid">
    <h3>Posts</h3>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create Post</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Title</th><th>Category</th><th>Published</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ optional($p->category)->name }}</td>
                <td>{{ $p->published ? 'Yes':'No' }}</td>
                <td><a class="btn btn-sm btn-secondary" href="{{ route('admin.posts.edit',$p) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

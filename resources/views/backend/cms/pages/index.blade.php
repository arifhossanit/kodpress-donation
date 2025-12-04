@extends('backend.layouts.app')

@section('title','Pages')

@section('content')
<div class="container-fluid">
    <h3>Pages</h3>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create Page</a>
    <table class="table mt-3"><thead><tr><th>ID</th><th>Title</th><th>Slug</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{{ $page->id }}</td>
            <td>{{ $page->title }}</td>
            <td>{{ $page->slug }}</td>
            <td><a class="btn btn-sm btn-secondary" href="{{ route('admin.pages.edit',$page) }}">Edit</a></td>
        </tr>
    @endforeach
    </tbody></table>
</div>
@endsection

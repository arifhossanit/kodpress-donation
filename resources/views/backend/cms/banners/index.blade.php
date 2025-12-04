@extends('backend.layouts.app')

@section('title','Banners')

@section('content')
<div class="container-fluid">
    <h3>Banners / Sliders</h3>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Create Banner</a>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-secondary ms-2">(Uses file uploader)</a>
    <table class="table mt-3"><thead><tr><th>ID</th><th>Title</th><th>Active</th><th>Actions</th></tr></thead>
    <tbody>
    @foreach($banners as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->title }}</td>
            <td>{{ $b->active ? 'Yes' : 'No' }}</td>
            <td><a class="btn btn-sm btn-secondary" href="{{ route('admin.banners.edit',$b) }}">Edit</a></td>
        </tr>
    @endforeach
    </tbody></table>
</div>
@endsection

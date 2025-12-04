@extends('backend.layouts.app')

@section('title','Galleries')

@section('content')
<div class="container-fluid">
    <h3>Galleries</h3>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Create Gallery</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($galleries as $g)
            <tr>
                <td>{{ $g->id }}</td>
                <td>{{ $g->name }}</td>
                <td><a class="btn btn-sm btn-secondary" href="{{ route('admin.galleries.edit',$g) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

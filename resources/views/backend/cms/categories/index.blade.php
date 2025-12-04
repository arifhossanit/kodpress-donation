@extends('backend.layouts.app')

@section('title','Categories')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h3>Categories</h3>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
            <table class="table mt-3">
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Type</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->type }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm btn-secondary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('backend.layouts.app')

@section('title', 'Gallery Items')

@section('content')
<div class="container-fluid">
    <h3>Gallery: {{ $gallery->name }}</h3>
    <a href="{{ route('admin.galleries.items.create', $gallery) }}" class="btn btn-primary">Add Item</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Preview</th><th>Title</th><th>Order</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($items as $it)
            <tr>
                <td>{{ $it->id }}</td>
                <td><img src="{{ asset('storage/'.$it->image_path) }}" style="height:60px"/></td>
                <td>{{ $it->title }}</td>
                <td>{{ $it->order }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.galleries.items.edit', [$gallery, $it]) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

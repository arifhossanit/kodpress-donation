@extends('backend.layouts.app')

@section('title', 'Gallery Items')

@section('content')
<div class="container-fluid">
    <h3>Gallery: {{ $gallery->name }}</h3>
    <a href="{{ route('admin.galleries.items.create', $gallery) }}" class="btn btn-primary mb-3">Add Item</a>
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary mb-3">Back to Galleries</a>
    @if($items->isEmpty())
        <div class="alert alert-info">No items in this gallery yet.</div>
    @else
    <table class="table mt-3 table-striped">
        <thead class="table-light"><tr><th>ID</th><th>Preview</th><th>Title</th><th>Caption</th><th>Order</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($items as $it)
            <tr>
                <td>{{ $it->id }}</td>
                <td>
                    @if($it->image_path && file_exists(storage_path('app/public/'.$it->image_path)))
                        <img src="{{ asset('storage/'.$it->image_path) }}" style="height:60px;object-fit:cover" alt="" />
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                </td>
                <td>{{ $it->title ?? '-' }}</td>
                <td>{{ substr($it->caption ?? '-', 0, 30) }}...</td>
                <td>{{ $it->order }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.galleries.items.edit', [$gallery, $it]) }}">Edit</a>
                    <form action="{{ route('admin.galleries.items.destroy', [$gallery, $it]) }}" method="POST" style="display:inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection

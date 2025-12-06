
    @extends('backend.layouts.app')

@section('title','Edit Gallery')

@section('content')
<div class="container-fluid">
    <h3>Gallery: {{ $gallery->name }}</h3>
    <div class="mb-4">
        <h5>Gallery Items</h5>
        <a href="{{ route('admin.galleries.items.create', $gallery) }}" class="btn btn-sm btn-primary mb-3">Add Item</a>
        @if($gallery->items()->count() > 0)
            <table class="table table-sm">
                <thead class="table-light">
                    <tr><th>ID</th><th>Preview</th><th>Title</th><th>Actions</th></tr>
                </thead>
                <tbody>
                @foreach($gallery->items()->orderBy('order')->get() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            @if($item->image_path && file_exists(storage_path('app/public/'.$item->image_path)))
                                <img src="{{ asset('storage/'.$item->image_path) }}" style="height:40px;object-fit:cover" alt="" />
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $item->title ?? '-' }}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="{{ route('admin.galleries.items.edit', [$gallery, $item]) }}">Edit</a>
                            <form action="{{ route('admin.galleries.items.destroy', [$gallery, $item]) }}" method="POST" style="display:inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">No items in this gallery yet.</p>
        @endif
    </div>

    <div class="mb-3">
        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="display:inline;">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this gallery and all its items? This cannot be undone.')">Delete Gallery</button>
        </form>
    </div>
</div>
@endsection
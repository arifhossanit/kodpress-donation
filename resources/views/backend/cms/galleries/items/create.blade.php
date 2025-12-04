@extends('backend.layouts.app')

@section('title','Add Gallery Item')

@section('content')
<div class="container-fluid">
    <h3>Add item to: {{ $gallery->name }}</h3>
    <form action="{{ route('admin.galleries.items.store', $gallery) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- none --</option>
                @foreach(App\Models\Category::where('type','gallery')->get() as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="imageInput">
            <img id="preview" src="#" style="display:none;max-height:140px;margin-top:8px;" />
        </div>
        <div class="form-group">
            <label>Caption</label>
            <textarea name="caption" class="form-control" rows="3"></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev){
        const img = document.getElementById('preview');
        img.src = ev.target.result; img.style.display='block';
    }
    reader.readAsDataURL(file);
});
</script>
@endpush

@endsection

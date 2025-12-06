@extends('backend.layouts.app')

@section('title','Add Gallery Item')

@section('content')
<div class="container-fluid">
    <h3>Add item to: {{ $gallery->name }}</h3>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.galleries.items.store', $gallery) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="imageInput">
            @error('image')<span class="invalid-feedback d-block">{{ $message }}</span>@enderror
            <img id="preview" src="#" style="display:none;max-height:140px;margin-top:8px;" />
        </div>
        <div class="form-group">
            <label>Caption</label>
            <textarea name="caption" class="form-control" rows="3">{{ old('caption') }}</textarea>
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('admin.galleries.items.index', $gallery) }}" class="btn btn-secondary">Cancel</a>
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

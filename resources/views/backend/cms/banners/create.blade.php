@extends('backend.layouts.app')

@section('title','Create Banner')

@section('content')
<div class="container-fluid">
    <h3>Create Banner</h3>
    <form action="{{ route('admin.banners.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="imageInput">
            <img id="preview" src="#" style="display:none;max-height:140px;margin-top:8px;" />
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" name="link" class="form-control">
        </div>
        <div class="form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active">
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e){
    const file = e.target.files[0]; if (!file) return; const reader = new FileReader();
    reader.onload = function(ev){ document.getElementById('preview').src = ev.target.result; document.getElementById('preview').style.display='block'; }
    reader.readAsDataURL(file);
});
</script>
@endpush

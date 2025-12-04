@extends('backend.layouts.app')

@section('title','Edit Page')

@section('content')
<div class="container-fluid">
    <h3>Edit Page: {{ $page->title }}</h3>

    <div class="row">
        <div class="col-md-4">
            <h5>Page Info</h5>
            <form action="{{ route('admin.pages.update', $page) }}" method="post">
                @method('PUT') @csrf
                <div class="form-group"><label>Title</label><input name="title" value="{{ $page->title }}" class="form-control"/></div>
                <div class="form-group"><label>Slug</label><input name="slug" value="{{ $page->slug }}" class="form-control"/></div>
                <div class="form-group"><label>Content (fallback)</label><textarea name="content" class="form-control" rows="4">{{ $page->content }}</textarea></div>
                <button class="btn btn-primary">Save</button>
            </form>
            <hr/>
            <h5>Add Section</h5>
            <form action="{{ route('admin.pages.sections.store', $page) }}" method="post">
                @csrf
                <div class="form-group"><label>Name</label><input name="name" class="form-control"/></div>
                <div class="form-group"><label>Background Color</label><input type="color" name="settings[bg_color]" class="form-control"/></div>
                <div class="form-group"><label>Padding (px)</label><input type="number" name="settings[padding]" class="form-control"/></div>
                <button class="btn btn-secondary">Add Section</button>
            </form>
        </div>

        <div class="col-md-8">
            <h5>Sections (drag to reorder)</h5>
            <div id="sections">
                @foreach($page->sections as $section)
                    <div class="card mb-2 section-item" data-id="{{ $section->id }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $section->name ?? 'Section #'.$section->id }}</strong>
                                <div>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="document.getElementById('del-section-{{ $section->id }}').submit();return false;">Delete</a>
                                </div>
                            </div>
                            <p><small>Settings: <pre>{{ json_encode($section->settings) }}</pre></small></p>

                            <h6>Blocks (drag to reorder)</h6>
                            <div class="blocks" data-section-id="{{ $section->id }}">
                                @foreach($section->blocks as $block)
                                    <div class="card mb-1 block-item" data-id="{{ $block->id }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div><strong>{{ $block->type ?? 'Block' }}</strong></div>
                                                <div>
                                                    <button class="btn btn-sm btn-secondary" data-toggle="collapse" data-target="#block-edit-{{ $block->id }}">Edit</button>
                                                    <form method="post" action="{{ route('admin.sections.blocks.destroy', [$section, $block]) }}" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Del</button></form>
                                                </div>
                                            </div>
                                            <div><pre>{{ $block->content }}</pre></div>
                                            <div id="block-edit-{{ $block->id }}" class="collapse">
                                                <form method="post" action="{{ route('admin.sections.blocks.update', [$section, $block]) }}">
                                                    @csrf @method('PUT')
                                                    <div class="form-group"><label>Type</label><input name="type" class="form-control" value="{{ $block->type }}"/></div>
                                                    <div class="form-group"><label>Content</label><textarea name="content" class="form-control wysiwyg" rows="6">{{ $block->content }}</textarea></div>
                                                    <div class="form-row">
                                                        <div class="col form-group"><label>Background</label><input type="color" name="settings[bg_color]" class="form-control" value="{{ $block->settings['bg_color'] ?? '' }}"/></div>
                                                        <div class="col form-group"><label>Padding (px)</label><input type="number" name="settings[padding]" class="form-control" value="{{ $block->settings['padding'] ?? '' }}"/></div>
                                                    </div>
                                                    <button class="btn btn-sm btn-primary">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <hr/>
                            <form method="post" action="{{ route('admin.sections.blocks.store', $section) }}">
                                @csrf
                                <div class="form-row g-2">
                                    <div class="col-3">
                                        <select id="template-select-{{ $section->id }}" class="form-control">
                                            <option value="">-- Template --</option>
                                            <option value="hero">Hero (image + title)</option>
                                            <option value="text">Text</option>
                                            <option value="gallery">Gallery</option>
                                        </select>
                                    </div>
                                    <div class="col-3"><input name="type" placeholder="Block type" class="form-control type-input"/></div>
                                    <div class="col-4"><input name="content" placeholder='Content' class="form-control content-input"/></div>
                                    <div class="col-2"><button class="btn btn-sm btn-secondary">Add Block</button></div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col"><label>Background</label><input type="color" name="settings[bg_color]" class="form-control"/></div>
                                    <div class="col"><label>Padding (px)</label><input type="number" name="settings[padding]" class="form-control"/></div>
                                </div>
                            </form>

                            <form id="del-section-{{ $section->id }}" method="post" action="{{ route('admin.pages.sections.destroy', [$page, $section]) }}">@csrf @method('DELETE')</form>
                        </div>
                    </div>
                @endforeach
            </div>
            <button id="save-order" class="btn btn-primary">Save Sections Order</button>
        </div>
    </div>
</div>

@push('styles')
<style>
 .section-item { cursor: grab; }
 .block-item { cursor: grab; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
// Initialize TinyMCE for any textarea with class 'wysiwyg'
function initWysiwyg(selector){
    tinymce.init({
        selector: selector,
        menubar: false,
        plugins: 'link image lists code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link | code',
        height: 250
    });
}
initWysiwyg('.wysiwyg');

const sectionsEl = document.getElementById('sections');
const sortableSections = Sortable.create(sectionsEl, { animation: 150, handle: '.card-body' });

document.getElementById('save-order').addEventListener('click', function(){
    const ids = Array.from(document.querySelectorAll('.section-item')).map(el => el.dataset.id);
    fetch('{{ route('admin.pages.sections.reorder', $page) }}', {
        method: 'POST', headers: { 'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}' },
        body: JSON.stringify({ ids })
    }).then(r=>r.json()).then(()=>location.reload());
});

// make blocks sortable per section
document.querySelectorAll('.blocks').forEach(function(el){
    Sortable.create(el, { group: 'blocks', animation: 120, onEnd: function(evt){
        const sectionId = el.dataset.sectionId;
        const ids = Array.from(el.querySelectorAll('.block-item')).map(b => b.dataset.id);
        fetch('/admin/sections/'+sectionId+'/blocks/reorder', {
            method:'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'}, body: JSON.stringify({ ids })
        });
    }});
});

// Wire template select to fill the add-block inputs
document.querySelectorAll('[id^="template-select-"]').forEach(function(sel){
    sel.addEventListener('change', function(){
        const sectionId = sel.id.replace('template-select-','');
        const row = sel.closest('.form-row');
        const typeInput = row.querySelector('.type-input');
        const contentInput = row.querySelector('.content-input');
        if (sel.value === 'hero'){
            typeInput.value = 'hero';
            contentInput.value = JSON.stringify({ title: 'Hero title', image: '' });
        } else if (sel.value === 'text'){
            typeInput.value = 'text';
            contentInput.value = 'Your text here...';
        } else if (sel.value === 'gallery'){
            typeInput.value = 'gallery';
            contentInput.value = JSON.stringify({ gallery_id: null });
        } else {
            typeInput.value = '';
            contentInput.value = '';
        }
    });
});

// Re-init TinyMCE on demand for dynamically revealed editors
document.querySelectorAll('.collapse').forEach(function(c){
    c.addEventListener('shown.bs.collapse', function(){
        initWysiwyg('#'+c.querySelector('.wysiwyg')?.id || '.wysiwyg');
    });
});
</script>
@endpush

@endsection

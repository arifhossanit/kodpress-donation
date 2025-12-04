@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="frontend-page">
    <header class="page-header">
        <h1>{{ $page->title }}</h1>
        @if($page->content)
            <p class="lead">{!! nl2br(e(Str::limit($page->content, 300))) !!}</p>
        @endif
    </header>

    {{-- Render sections --}}
    @foreach($page->sections as $section)
        @php $s = $section; $settings = $s->settings ?? []; @endphp
        <section class="section" style="padding:{{ $settings['padding'] ?? 40 }}px;background:{{ $settings['bg_color'] ?? 'transparent' }};margin-bottom:18px;border-radius:6px">
            <div class="section-inner">
                <h2>{{ $s->name }}</h2>

                {{-- Render blocks inside section --}}
                @foreach($s->blocks as $block)
                    @php
                        $type = $block->type ?? 'text';
                        $content = $block->content;
                        $parsed = null;
                        try { $parsed = json_decode($content, true); } catch (\Exception $e) { $parsed = null; }
                    @endphp

                    @if($type === 'hero')
                        @php $hero = is_array($parsed) ? $parsed : ['title' => $block->content]; @endphp
                        <div class="hero-block">
                            <div style="flex:1">
                                <h3>{!! $hero['title'] ?? '' !!}</h3>
                                @if(!empty($hero['subtitle']))<p class="muted">{!! $hero['subtitle'] !!}</p>@endif
                            </div>
                            @if(!empty($hero['image']))
                                <div style="width:320px"><img src="{{ asset('storage/'.$hero['image']) }}" style="width:100%;border-radius:6px"/></div>
                            @endif
                        </div>

                    @elseif($type === 'gallery')
                        @php
                            $gdata = is_array($parsed) ? $parsed : null;
                            $gallery = null;
                            if ($gdata && !empty($gdata['gallery_id'])) {
                                $gallery = \App\Models\Gallery::with('items')->find($gdata['gallery_id']);
                            }
                        @endphp
                        @if($gallery)
                            <div class="gallery-grid">
                                @foreach($gallery->items as $it)
                                    <div><img src="{{ asset('storage/'.$it->image_path) }}" style="width:100%;height:160px;object-fit:cover;border-radius:6px"/></div>
                                @endforeach
                            </div>
                        @endif

                    @else
                        {{-- default: text block (allow HTML produced by editor) --}}
                        <div class="text-block">{!! $block->content !!}</div>
                    @endif

                @endforeach
            </div>
        </section>
    @endforeach

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <article class="prose prose-lg max-w-none text-gray-800">
        <h1 class="text-3xl font-bold text-luxury-gold mb-6">{{ $page->title }}</h1>
        
        @if($page->meta_title || $page->meta_description)
        <div class="bg-luxury-accent p-4 rounded-lg mb-6">
            @if($page->meta_title)
            <h2 class="text-xl font-semibold text-luxury-gold">{{ $page->meta_title }}</h2>
            @endif
            @if($page->meta_description)
            <p class="mt-2 text-gray-300">{{ $page->meta_description }}</p>
            @endif
        </div>
        @endif

        <div class="cms-content">
            {!! $page->content !!}
        </div>
    </article>
</div>
@endsection
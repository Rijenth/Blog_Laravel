@extends('/components/layout')

@section('content')

{{-- Permet d'inclure le header --}}
{{-- 'post._header' == '/post/_header' --}}
@include('post._header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    {{-- Si jamais il n'y a aucun post à afficher alors on fait un if : --}}

    @if ($mesPost->count())

    <x-posts-grid :posts="$mesPost" />

    @else
        <p> No posts yet. Please check back later.

    @endif

    {{-- <div class="lg:grid lg:grid-cols-3">
        <x-post-card />
        <x-post-card />
        <x-post-card />
    </div> --}}
</main>


@endsection


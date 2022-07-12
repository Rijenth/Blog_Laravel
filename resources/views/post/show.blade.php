{{-- <x-layout>
    <article>
        '!!' Permet d'activer l'affichage des balises HTMLS
        {!! $content->body !!}
    </article>
</x-layout> --}}

@extends('/components/layout')

@section('content')

<section class="px-6 py-8">

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published : <time>{{$content->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold"><a href="/?author={{$content->author->username}}">{{$content->author->name}}</a></h5>
                        <h6>{{$content->author->username}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        <a href="/?category={{$content->category->slug}}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{$content->category->name}}</a>

                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{$content->title}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose space-y-4">
                    {!! $content->body !!}
                </div>
            </div>

        <section class='col-span-8 col-start-5 mt-10 space-y-6'>

            {{-- Poster un commentaire --}}
            <x-post-new-comment :content="$content"/>

            {{-- Les commentaires --}}
            @foreach ($content->comments as $comment)
                <x-post-comment :comment="$comment" />
            @endforeach


        </section>

        </article>
    </main>
</section>

@endsection

{{-- <article> --}}
    {{-- '!!' Permet d'activer l'affichage des balises HTMLS --}}
    {{-- <a href="/">
        <h1>{{$content->title}}</h1>
    </a>

    <p>
       Written by <a href="/authors/{{$content->author->username}}">{{$content->author->username}}</a> in <a href="/categories/{{$content->category->slug}}">
        {{$content->category->name}}
    </a>
    </p>

    <p>
        {!! $content->body !!}
    </p>


    <a href="/">Retour</a>
    </article> --}}

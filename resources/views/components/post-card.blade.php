@props(['posts'])

<article {{$attributes->merge(['class' => "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}>
    <div class="py-6 px-5">
        <div>
            <img src="/storage/{{ $posts->thumbnail }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/?category={{$posts->category->slug}}"
                        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                        style="font-size: 10px">{{$posts->category->name}}</a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/title/{{$posts->slug}}">{{$posts->title}}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Publication : <time>{{$posts->category->created_at->diffForHumans()}}
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">

                    {!! $posts->excerpt !!}


                {{-- <p class="mt-4">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p> --}}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/storage/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold"><a href="?author={{$posts->author->username}}">{{$posts->author->username}}</a></h5>
                        {{-- <h6>{{$posts->author->name}}</h6> --}}
                    </div>
                </div>

                <div>
                    <a href="/title/{{$posts->slug}}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

{{-- @foreach ($mesPost as $valueInMesPost)
    <article>

        <h1>
            <a href="/title/{{$valueInMesPost->slug}}">
                {{$valueInMesPost->title}}
            </a>
        </h1>

        <p>
           Written by <a href="/authors/{{$valueInMesPost->author->username}}">{{$valueInMesPost->author->username}}</a>
        in <a style='color:green' href="/categories/{{$valueInMesPost->category->slug}}">{{$valueInMesPost->category->name}}</a>
        </p>


        <p>{{$valueInMesPost->excerpt}}</p>


    </article>
    @endforeach --}}

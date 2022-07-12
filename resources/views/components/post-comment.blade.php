@props(['comment'])
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">

    {{-- La photo de profil du commentaire --}}
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->id}}" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>

        {{-- Le header du commentaire --}}
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        {{-- Le contenu du commentaire --}}
        <p>
            {{ $comment->body }}
        </p>

    </div>
</article>

@props(['content'])
@auth
    <x-panel>
        {{-- Poster son commentaire --}}
        <form
        action="/posts/{{ $content->slug }}/comments"
        method="post"
        >
        @csrf

        {{-- Header --}}
        <header class='flex items-center'>
            <img src="https://i.pravatar.cc/60?u={{ auth()-> id() }}" alt="" width="40" height="40" class="rounded-full">
            <h2 class='ml-4'>Want to partipate ? </h2>
        </header>

        {{-- TextArea --}}
        <div class='mt-6'>
            <textarea
                name="body"
                class='w-full text-sm focus:outline-none focus:ring'
                cols="30" rows="10"
                placeholder="Say something"
                required></textarea>
        </div>

        {{-- Error body not found --}}
        @error('body')
            <span class="text-red-500 font-xs">
                {{ $message }}
            </span>
        @enderror

        <div class='flex justify-end mt-6 pt-6 border-t border-gray-200'>
            <button class='bg-blue-500 text-white upperace font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600' type="submit">Post</button>
        </div>

        </form>
    </x-panel>

    {{-- Error not logged in --}}
    @else
        <p>
            <a href="/register" class='hover:underline'><strong>Register</strong></a> or <a href="/login" class='hover:underline'><strong>Log</strong></a> in to leave a comment.
        </p>

@endauth

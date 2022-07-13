@extends('/components/layout')

@section('content')

    <section class="px-6 py-8">

        <x-panel class="max-w-sm mx-auto">

            <form action="/admin/posts" method="post">
                @csrf

                {{-- Le titre --}}
                <div class='mb-6'>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <input
                        type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="title"
                        id='title'
                        value="{{ old('title') }}"
                        required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Le slug --}}
                <div class='mb-6'>
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">slug</label>
                    <input
                        type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="slug"
                        id='slug'
                        value="{{ old('slug') }}"
                        required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- La catégorie --}}
                <div class='mb-6'>
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">category</label>
                        <select
                        class="bg-blue-200 border text-center rounded-xl"
                        name="category_id"
                        id="category_id"
                        >

                            @php
                                $categories = \App\Models\Category::all();
                            @endphp

                            @foreach ($categories as $category)
                                <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : ''}}
                                >{{ $category->name}}</option>
                            @endforeach

                        </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- L'excerpt --}}
                <div class='mb-6'>
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">excerpt</label>
                    <textarea
                        value="{{ old('excerpt') }}"
                        type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="excerpt"
                        id='excerpt'
                        required>
                        {{ old('excerpt') }}
                    </textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Le body --}}
                <div class='mb-6'>
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">body</label>
                    <textarea
                        type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="body"
                        id='body'
                        required>
                        {{ old('body') }}
                    </textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>


        </x-panel>


    </section>

{{-- Permet d'inclure le header --}}
{{-- 'post._header' == '/post/_header' --}}



@endsection

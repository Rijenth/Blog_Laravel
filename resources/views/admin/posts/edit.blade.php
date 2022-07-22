@extends('/components/layout')

@section('content')

    <x-setting heading="Edit post number : {{$post->id}}">
    <section class="py-8 max-w-md mx-auto">

        <h1 class="text-lg font-bold mb-4">Publish New Post</h1>

        <x-panel >

            <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title',$post->title)" />
                <x-form.input name="slug" :value="old('slug',$post->slug)"/>

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file"  :value="old('thumbnail',$post->thumbnail)"/>
                    </div>
                    <img src="{{ asset('storage/'.$post->thumbnail)}}" alt="" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
                <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="category"/>
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
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}
                                >{{ $category->name}}</option>
                            @endforeach
                        </select>

                        <x-form.error name="category"/>

                </x-form.field>


                {{-- Le bouton d'envoi --}}
                <x-form.field>
                    <x-submit-button>Update</x-submit-button>
                </x-form.field>
            </form>


        </x-panel>


    </section>
</x-setting>



@endsection


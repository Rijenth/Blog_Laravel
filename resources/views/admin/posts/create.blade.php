@extends('/components/layout')

@section('content')

    <x-setting heading="Publish New Post">
    <section class="py-8 max-w-md mx-auto">

        <h1 class="text-lg font-bold mb-4">Publish New Post</h1>

        <x-panel >

            <form action="/admin/posts" method="post" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.select name="category_id"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>

                {{-- Le bouton d'envoi --}}
                <x-form.field>
                    <x-submit-button>Publish</x-submit-button>
                </x-form.field>
            </form>


        </x-panel>


    </section>
</x-setting>



@endsection


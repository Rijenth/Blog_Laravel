@extends('/components/layout')

@section('content')

    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 border border-gray-200 p-6 rounded-xl'>

            <h1 class="text-center font-bold text-xl">Registration</h1>

            <form
                action="/register"
                method="POST" class="mt-10">
                @csrf

                <x-form.input name="name" type="text" />
                <x-form.input name="username" type="text"/>
                <x-form.input name="password" type="password"/>
                <x-form.input name="email" type="email"/>


                <x-form.field>
                    <x-submit-button>Publish</x-submit-button>
                </x-form.field>




            </form>
        </main>

    </section>

@endsection



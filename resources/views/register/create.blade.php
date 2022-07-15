@extends('/components/layout')

@section('content')

    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 border border-gray-200 p-6 rounded-xl'>

            <h1 class="text-center font-bold text-xl">Registration</h1>

            <form
                action="/register"
                method="POST" class="mt-10">
                @csrf

                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="password"/>
                <x-form.input name="email"/>


                <x-form.field>
                    <x-submit-button>Publish</x-submit-button>
                </x-form.field>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)

                    <ul>
                        <li
                            class="text-red-500 text-xs">
                            {{$error}}
                        </li>
                    </ul>

                    @endforeach
                @endif


            </form>
        </main>

    </section>

@endsection



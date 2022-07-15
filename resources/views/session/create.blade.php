@extends('/components/layout')

@section('content')

    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 border border-gray-200 p-6 rounded-xl'>

            <h1 class="text-center font-bold text-xl">Login</h1>

            <form
                action="/login"
                method="POST" class="mt-10">
                @csrf
                <div class="mb-6">

                <x-form.input name="email" type="email" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="new-password"/>


                <div class="mt-6">
                    {{-- Submit --}}
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Login
                    </button>

                </div>

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

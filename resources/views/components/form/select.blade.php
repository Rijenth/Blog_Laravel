@props(['name'])

<x-form.field>
    <x-form.label name="category" />

    <select
        class="bg-blue-200 border text-center rounded-xl"
        name="{{$name}}"
        id="{{$name}}"
        >

            @php
                $categories = \App\Models\Category::all();
            @endphp

            @foreach ($categories as $category)
                <option
                value="{{ $category->id }}"
                {{ old('$name') == $category->id ? 'selected' : ''}}
                >{{ $category->name}}</option>
            @endforeach

        </select>

    <x-form.error name="{{$name}}"/>
</x-form>

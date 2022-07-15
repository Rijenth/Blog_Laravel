<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

            {{ (isset($currentCategory)) ? ucwords($currentCategory->name) : 'Catégories'}}

            {{-- Mon svg --}}
            <x-my-svg  class="pointer-events-none ml-20"/>


        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page'))}}"
    :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category)

{{-- Explication de http_build_query

    ['name' =>'john'] // devient // name=john

    ['name' =>'john', 'prenom' => 'pierre'] // devient // name=john&prenom=pierre

    --}}


    <x-dropdown-item
    href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category', 'page'))}}"
    :active="request('category') === $category->slug"
    >
        {{ ucwords($category->name)}}

    </x-dropdown-item>

    @endforeach

</x-dropdown>


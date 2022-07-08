@props(['posts'])

 {{-- Représente un composant, présent dans le fichier 'components' --}}
 <x-main-card :posts="$posts[0]"/>

 @if ($posts->count() > 1)
 
     <div class="lg:grid lg:grid-cols-6">
         @foreach ($posts->skip(1) as $valueInMyPost)
             <x-post-card :posts="$valueInMyPost" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>      
         @endforeach
     </div>

 @endif
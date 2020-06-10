<div class="relative">
    <input wire:model.debounce.200ms="search" type="text" class="bg-gray-800 text-white text-sm rounded-full w-64 px-4 pl-8 py-1 ml-1
     focus:outline-none focus:shadow-outline" placeholder="Chercher votre film">
     <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    <div class="absolute bg-gray-800 text-sm rounded w-64 ml-1 mt-2">
        @if($results->count() > 0)
        <ul>
            @foreach($results as $result)
            <li class="border-b border-gray-700">
            <a href="{{route('show',$result['id'])}}" class="block hover:bg-blue-800 text-white font-bold  px-3 py-2 flex items-center">
                @if($result['poster_path'])
                 <img src="{{'https://image.tmdb.org/t/p/w92/'.$result['poster_path']}}" alt="Poster" class="w-8">  
                @else
                <img src="{{asset('images/default.jpg')}}" alt="Default poster" class="w-8">
                @endif 
                <span class="ml-4">{{ $result['title'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @elseif($search == '')
            <div class="px-3 py-3" hidden></div>
        @else
            <div class="px-3 py-2 text-white">Pas de résultat pour : {{$search}}</div>
        @endif
    </div>
</div>

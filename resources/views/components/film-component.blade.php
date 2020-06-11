<div class="mt-5">
    <a href="{{url('film/'.$film['id'])}}">
        <img src="{{'https://image.tmdb.org/t/p/w500/'.$film['poster_path']}}" alt="poster" width="600px" height="800px">
    </a>
    <div class="mt-2 ml-1">
        <a href="{{url('film/'.$film['id'])}}"  class="text-white text-lg text-bold mt-2">{{$film['title']}}</a>
        <div class="felx items-center text-warning text-sm">
            <span>{{$film['vote_count']}} votes</span>
            <span >|</span>
            <span>{{ \Carbon\Carbon::parse($film['release_date'])->format('d M Y')}}</span>
        </div>
        <!--<div class="text-black text-sm">
            Action - Trailler - Comedie
        </div> -->
    </div>
</div>
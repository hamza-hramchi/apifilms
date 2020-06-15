<div class="mt-5">
    <a href="{{url('film/'.$film['id'])}}">
        <img src="{{'https://image.tmdb.org/t/p/w500/'.$film['poster_path']}}" alt="poster" width="600px" height="800px">
    </a>
    <div class="mt-2 ml-1">
        <a href="{{url('film/'.$film['id'])}}"  class="text-white text-lg mt-2">{{$film['title']}}</a>
    </div>
</div>
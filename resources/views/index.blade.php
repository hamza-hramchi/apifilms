@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-8 mt-4">
        <div class="films">
            <h2 class="uppercase text-default text-bold"> Les films </h2>
            <!--- Grid --->
            <div class="grid grid-cols-5 gap-8 mt-2">
                @foreach($films as $film)
                <div class="mt-5">
                    <a href="{{url('film/'.$film['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$film['poster_path']}}" alt="poster" width="600px" height="800px">
                    </a>
                    <div class="mt-2 ml-4">
                        <a href="{{url('film/'.$film['id'])}}"  class="text-white text-lg text-bold mt-2">{{$film['title']}}</a>
                        <div class="felx items-center text-warning text-sm">
                            <span>{{$film['vote_count']}} votes</span>
                            <span >|</span>
                            <span>{{$film['release_date']}}</span>
                        </div>
                        <!--<div class="text-black text-sm">
                            Action - Trailler - Comedie
                        </div> -->
                    </div>
                </div>
                @endforeach
            </div>
            <!---/ Grid --->
        </div>
    </div>
@endsection
@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-8 mt-4">
        <div class="films">
            <h2 class="uppercase text-default text-bold"> Les films </h2>
            <!--- Grid --->
            <div class="grid grid-cols-5 gap-8 mt-2">

                <div class="mt-5">
                    <a href="{{route('show')}}">
                        <img src="{{asset('images/poster.jpg')}}" alt="poster" width="600px" height="800px">
                    </a>
                    <div class="mt-2 ml-4">
                        <a href="{{route('show')}}"  class="text-white text-lg text-bold mt-2">Film1</a>
                        <div class="felx items-center text-warning text-sm">
                            <span>Star</span>
                            <span>85%</span>
                            <span >|</span>
                            <span>Date</span>
                        </div>
                        <!--<div class="text-black text-sm">
                            Action - Trailler - Comedie
                        </div> -->
                    </div>
                </div>
            </div>
            <!---/ Grid --->
        </div>
    </div>
@endsection
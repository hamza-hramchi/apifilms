@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-8 mt-3">
        <div class="films">
            <h4 class="uppercase tracking-wider ext-info text-lg font-semibold">
                Films
            </h4>
            <!--- Grid --->
            <div class="grid grid-cols-4 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="{{asset('images/poster.jpg')}}" alt="poster" class="">
                    </a>
                    <div class="mt-2 ml-4">
                        <a href="#" class="text-white text-bold text-lg mt-2 hover:text-gray-300">Film1</a>
                        <div class="felx items-center text-gray">
                            <span>Star</span>
                            <span>85%</span>
                            <span >|</span>
                            <span>Date</span>
                        </div>
                        <div class="text-info">
                            Action - Trailler - Comedie
                        </div>
                    </div>
                </div>
                
            </div>
            <!---/ Grid --->
        </div>
    </div>
@endsection
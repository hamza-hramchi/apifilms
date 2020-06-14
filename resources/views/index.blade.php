@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-8 mt-4">
        <div class="films">
        <h2 class="uppercase text-bold" style="color:#f4ff8e">
                <i class="fas fa-film"></i>
                Les films les plus populaires
            </h2>
            <!--- Grid --->
            <div class="grid grid-cols-5 gap-8 mt-2">
                @foreach($films as $film)
                <x-film-component :film=$film />
                @endforeach
            </div>
            <!---/ Grid --->
        </div>
    </div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    public function index(){
        $films = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=ff3d7a37ebce90ac13d25ffeacb9c48d')->json()['results'];
        return view('index', ['films' => $films]);
    }

    public function show($id){
        //API
        $film = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=ff3d7a37ebce90ac13d25ffeacb9c48d&language=en-US')->json();
        return view('show', ['film' => $film]);
    }

    public function getCritics($id){
        $critics = Film::where('film_id','=', $id)->get();
        return ['critics' => $critics];
    }

    public function latest(){
        $latest = Film::orderBy('created_at','desc')->take(4)->get();
        return ['latest' => $latest];
        
    }


}

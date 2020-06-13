<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    // Récuperer les données depuis l API
    public function index(){
        $films = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=ff3d7a37ebce90ac13d25ffeacb9c48d')->json()['results'];
        return view('index', ['films' => $films]);
    }

    // Afficher les détails du film
    public function show($id){
        $film = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=ff3d7a37ebce90ac13d25ffeacb9c48d&language=en-US')->json();
        return view('show', ['film' => $film]);
    }

    // Récuperer les critiques
    public function getCritics($id){
        $critics = Film::where('film_id','=', $id)->get();
        $data = Film::where('film_id','=', $id)->get('id');
        $users = array();
        foreach($data as $user){
            $user_name = Film::find($user->id)->user()->get('name');
            array_push($users,$user_name);  
        }
        return ['critics' => collect([$users,$critics]) ];
    }

    // Les derniers films critiqués
    public function latest(){
        $latest = Film::orderBy('created_at','desc')->take(4)->get();
        return ['latest' => $latest];
        
    }

    // La note du film
    public function getNote($id){
        $note = Film::where('film_id', '=', $id)->get('note');
        return ['note' => $note];
    }


}

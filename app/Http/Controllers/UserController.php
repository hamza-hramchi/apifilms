<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Le constructeur
    public function __construct(){
        $this->middleware('auth'); // Middleware d'authentification
    }

    // Afficher les données de l'utilisateur
    public function show(){
        $user = Auth::user();
        $critics = Film::where('user_id', '=', Auth::user()->id)->get();
        $data = collect([$user,$critics]);
        return view('moncompte',['data' => $data]);
    }

    // Ajouter une critique
    public function addCritic(Request $request, $idfilm){
        $critic = new Film();
        $iduser = Auth::user()->id;
        $critic->user_id = $iduser;
        $critic->film_id = $idfilm;
        $critic->titre   = $request->input('titre');
        $critic->contenu = $request->input('contenu');
        $critic->film_titre = $request->input('film_titre');
        $critic->note = $request->input('rating');
        $critic->save();   
    }

    // Supprimer une critique
    public function delete($id){
        Film::destroy([$id]);
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

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

    // Supprimer un user
    public function destroyUser($id){
        $this->authorize('isAdmin');
        $film = new Film;
        $user = $film->with('user')->get('id');
        for($i = 0; $i< count($user); $i++){
            Film::destroy([$user[$i]->id]);
        }
        User::destroy([$id]);
        return back();
    }

    // Dashboard admin
    public function panel(){
        $this->authorize('isAdmin');
        $films = new Film();
        $users = new User();
        $data = array();
        //return view('admin',['users' => $users]);
        $users = $films->with('user')->get();
        foreach($users as $user){
            array_push($data,collect([$user->id,$user['user']->name,$user->film_titre,$user->contenu]));
        }

        return view('admin',['data' => $data, 'users' => User::where('type', '=', "user")->get()]);

    }

    
    // récuprere l'utilisateur
    public function getUser($id){
        $this->authorize('isAdmin');
        return ['user' => User::find($id)];
    }

    // Mettre à jour les informations d'un utilisateur
    public function update(Request $request, $id){
        $this->authorize('isAdmin');
        $user = User::findOrFail($id);

        $this->validate($request, [
            'email'    =>  'required|unique:users,email,'.$id,
        ]);
        
        $user->name = $request->input('nom');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->save();
        
    }

    // Ajouter un utilisateur
    public function addUser(Request $request){
        $this->authorize('isAdmin');
        $user = new User;
        $user->name = $request->input('nomUser');
        $user->email = $request->input('emailUser');
        $user->password = Hash::make($request->input('passwordUser'));
        $user->type = $request->input('typeUser');
        $user->save();

        return Redirect::back();
    }

}

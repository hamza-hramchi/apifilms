<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FilmController@index')->name('index');
Route::get('/film/{id}','FilmController@show')->name('show');
Route::get('/film/{id}/critiques','FilmController@getCritics');

Route::get('/moncompte','UserController@show')->name('moncompte');
Route::post('/critique/{idfilm}','UserController@addCritic')->name('critic');

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FilmController@index')->name('index');
Route::get('/film/{id}','FilmController@show')->name('show');
Route::get('/film/{id}/critiques','FilmController@getCritics')->name('critics');
Route::get('/lespluscritiques','FilmController@latest')->name('latest');

Route::get('/moncompte','UserController@show')->name('moncompte');
Route::post('/critique/{idfilm}','UserController@addCritic')->name('critic');
Route::post('/delete/{id}','UserController@delete')->name('delete');

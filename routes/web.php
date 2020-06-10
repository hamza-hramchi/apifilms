<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FilmController@index')->name('index');
Route::get('/film/{id}','FilmController@show')->name('show');

Route::get('/moncompte/{id}','UserController@show')->name('moncompte');
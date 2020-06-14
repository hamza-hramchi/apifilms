<?php

use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Film Routes
Route::get('/','FilmController@index')->name('index');
Route::get('/film/{id}','FilmController@show')->name('show');
Route::get('/film/{id}/critiques','FilmController@getCritics')->name('critics');
Route::get('/lespluscritiques','FilmController@latest')->name('latest');
Route::get('/film/{id}/note','FilmController@getNote')->name('note');

// User Routes
Route::get('/users','UserController@index')->name('users');
Route::get('/moncompte','UserController@show')->name('moncompte');
Route::post('/critique/{idfilm}','UserController@addCritic')->name('critic');
Route::post('/delete/{id}','UserController@delete')->name('delete');
Route::post('/deleteUser/{id}','UserController@destroyUser')->name('deleteUser');
Route::get('/getUser/{id}','UserController@getUser')->name('getUser');
route::post('/update/{id}','UserController@update')->name('update');

// Admin route
Route::get('/dashboard','UserController@panel')->name('dashboard');

// Send Mail
Route::get('/send-mail', function () {
    Mail::to('newuser@example.com')->send(new MailtrapExample()); 
    return 'A message has been sent to Mailtrap!';
});

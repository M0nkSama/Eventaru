<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('App\Http\Controllers')->group(function () 
{
    //Read all the Posts
    Route::get('/post','EventsController@index');

    //Create a new post
    Route::get('/post/create','EventsController@create'); //View
    Route::post('/post','EventsController@store'); //Logical Part

    //Edit a POST
    Route::get('/post/{id}/edit','EventsController@edit'); //View
    Route::post('/post/{id}','EventsController@update'); //Logical Part

    //Show individual data
    Route::get('/post/{id}','EventsController@show');

    //Delete an indicidual post
    Route::delete('/post/{id}','EventsController@destroy');


//Read all the Posts
Route::get('/category','CategoryController@index');

//Create a new post
Route::get('/category/create','CategoryController@create'); //View
Route::post('/category','CategoryController@store'); //Logical Part

//Edit a POST
Route::get('/category/{id}/edit','CategoryController@edit'); //View
Route::post('/category/{id}','CategoryController@update'); //Logical Part

//Show individual data
Route::get('/category/{id}','CategoryController@show');

//Delete an indicidual post
Route::delete('/category/{id}','CategoryController@destroy');


Route::get('/','FrontendController@Category');

 //Read all the Posts
 Route::get('/user','UserController@index');

 //Create a new post
 Route::get('/user/create','UserController@create'); //View
 Route::post('/user','UserController@store'); //Logical Part

 //Edit a POST
 Route::get('/user/{id}/edit','UserController@edit'); //View
 Route::post('/user/{id}','UserController@update'); //Logical Part

 //Show individual data
 Route::get('/user/{id}','UserController@show');

 //Delete an indicidual post
 Route::delete('/user/{id}','UserController@destroy');



});



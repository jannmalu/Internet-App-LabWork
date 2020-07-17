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
    return view('welcome');
});
Route::get('cars/newcar', function(){
    return view('pages/newcar');
});
Route::post('/cars', 'carController@newCar');
Route::get('/cars/{id}', 'carController@specificCar');
Route::get('/cars', 'carController@allCars');

Route::get('/cars/reviews/{id}', 'ReviewsController@specificCar');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
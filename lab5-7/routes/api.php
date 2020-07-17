<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cars/{id}', 'ApiController@search');
Route::get('cars/{id}/allreviews', 'ReviewsController@specificCarReviews');
Route::get('cars/reviews/{id}', 'ReviewsController@specificReview');
Route::get('reviews/all', 'ReviewsController@allReviews');
Route::get('reviews/{id}/car', 'ReviewsController@specificReviewCarDetails');

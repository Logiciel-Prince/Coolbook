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

// <----------------------- This Is For Dispalying my home page ---------------------------->
Route::get('/', function () {
    return view('home');
});
// <-------------- Along With The Category and post ---------------------------------->
Route::get('/','App\Http\Controllers\Controller@post');

// <------------------------ This Is Made By Breeze And Have No Use ---------------------->
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// <--------- When we Search Something The Above Function at line no. 17 not working so i made this ----------------->
Route::get('home','App\Http\Controllers\Controller@display_home');

// <---------------------- This Function Show Different Product According to Category In Home Page ----------------->
Route::get('category{id}','App\Http\Controllers\Controller@category');

// <---------------------- This Function Show Single Post And Their Comments ----------------->
Route::get('post{id}','App\Http\Controllers\Controller@singlepost');

// <---------------------- This Function add Comment In post ----------------->
Route::post('addcomment','App\Http\Controllers\Controller@addcomment');

// <---------------------- This Function Search Posts With their Tittle Name ----------------->
Route::post('search','App\Http\Controllers\Controller@search');

// <---------------------- This Function Upload A new Post By User ----------------->
Route::post('upload-image','App\Http\Controllers\Controller@upload_image');

// <---------------------- This Function Show categories in Upload Forn ----------------->
Route::get('upload','App\Http\Controllers\Controller@show_category');

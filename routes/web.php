<?php

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

Auth::routes(); 
Route::get('/home', 'HomeController@index') ; 


Route::get('/', 'WebController@index');
Route::get('/article/{id}', 'WebController@show'); 
Route::get('/category/{slug}', 'WebController@category'); 
Route::get('/allcategory', 'WebController@allcategory'); 
Route::get('/subcategory/{slug}', 'WebController@subcategory'); 
Route::post('/article/comment', 'WebController@Commentstore'); 
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::post('/contact', 'WebController@contact'); 
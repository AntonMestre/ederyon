<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*
    Routes principale (dashboard et home)
*/
Route::view('/','home');
Route::get('/dashboard','dashboardController@show')->middleware('auth');
Route::get('/dashboardtest','dashboardController@showtest')->middleware('auth');

/*
    Routes pour l'authentification
*/
Route::get('/logout','logoutController@logout')->middleware('auth');
Auth::routes();

/*
    Routes pour les items
*/
Route::get('/item','ItemController@item')->middleware('auth');
Route::post('/item', 'ItemController@searchitem')->middleware('auth');
Route::get('/item/add','ItemController@additem')->middleware('auth');
Route::post('/item/add', 'ItemController@additempost')->middleware('auth');
Route::get('/item/modif','ItemController@modifitem')->middleware('auth');
Route::post('/item/modif', 'ItemController@modifitempost')->middleware('auth');
Route::post('/item/supprimer', 'ItemController@ajaxSuppr')->middleware('auth');
Route::post('/item/mini_modif', 'ItemController@ajaxModif')->middleware('auth');
Route::get('/item/{id}', 'ItemController@modification')->middleware('auth');
Route::post('/item/{id}', 'ItemController@modificationPost')->middleware('auth');
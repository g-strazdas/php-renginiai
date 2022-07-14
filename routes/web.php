<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


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

Route::get('/',[EventController::class, 'index']);
Route::get('/add-event',[EventController::class, 'addEvent']);
Route::post('/store',[EventController::class, 'store']);

Route::get('/event/{event}',[EventController::class, 'showEvent']); //event-buvo imone
Route::get('/event/delete/{event}',[EventController::class, 'deleteEvent']); //event-buvo imone
Route::get('/event/update/{event}',[EventController::class, 'updateEvent']); //event-buvo imone
Route::post('/update/{event}',[EventController::class, 'storeUpdate']); //event-buvo imone

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Auth::routes(['register' => false]);

Route::resource('/news', App\Http\Controllers\NewsController::class);
Route::resource('/event', App\Http\Controllers\EventController::class);
Route::resource('/scholarship', App\Http\Controllers\ScholarshipController::class);
Route::resource('/cabinet', App\Http\Controllers\CabinetController::class);
Route::resource('/cabinet/{cabinet:id}/sectoral', App\Http\Controllers\SectoralController::class);
Route::resource('/cabinet/{cabinet:id}/sectoral/{sectoral:id}/functionaries', App\Http\Controllers\FunctionaryController::class);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbMClientController;
use App\Http\Controllers\TbMfClientController;
use App\Http\Controllers\TbMProjectController;
use App\Http\Controllers\TbMfProjectController;
use App\Http\Controllers\LoginController;

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

Route::get('/backend', function () {
    return view('home');
});
Route::get('/', function () {
    return view('frontend.layout.main');
});
Route::get('/home', function () {
    return view('home');
});
Route::resource('client', TbMClientController::class);
Route::resource('clientfrontend', TbMfClientController::class);
Route::resource('project', TbMProjectController::class);
Route::resource('projectfrontend', TbMfProjectController::class);

Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class,'logout']);
Route::post('/login', [LoginController::class,'authenticate']);

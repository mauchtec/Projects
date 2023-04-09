<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[DashboardController::class, 'index'])
->middleware('auth')
->name('dashboard');
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::get('/edit/{id}',[RegisterController::class, 'edit'])
->middleware('guest')
->name('edit');
Route::put('/update/{id}',[RegisterController::class, 'update'])
->middleware('guest')
->name('update');
Route::delete('/delete/{id}',[RegisterController::class, 'destroy'])
->middleware('guest')
->name('delete');
Route::post('/register',[RegisterController::class, 'store'])
->middleware('guest')
->name('register');


//Login
Route::get('/login',[LoginController::class, 'index']);
Route::post('/login',[LoginController::class, 'store'])->name('login');
Route::post('/logout',[LoginController::class,'destroy'])->name('logout');




//sites

Route::get('/sites', [SitesController::class, 'index']);
Route::get('/searchsite', [SitesController::class, 'search'])->name('searchsite');
Route::get('/site/{id}', [SitesController::class, 'edit'])
->middleware('auth')
->name('site');
Route::post('/sites', [SitesController::class, 'store'])
->middleware('auth')
->name('sites');
Route::put('/site/{id}',[SitesController::class, 'update']);
Route::delete('/deletesite/{id}',[SitesController::class, 'destroy'])
->middleware('auth')
->name('deletesite');

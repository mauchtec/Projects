<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobcardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\URL;
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

Route::get('/sites', [SitesController::class, 'index'])->middleware('auth');
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


Route::get('/sims',[SimController::class,'index']);
Route::post('/sims',[SimController::class,'store'])->name('sims');
Route::get('/simedit/{id}', [SimController::class, 'edit']);
Route::get('/usersim/{id}', [SimController::class, 'show']);
Route::delete('/deletesim/{id}', [SimController::class, 'destroy']);
Route::put('/simupdate/{id}',[SimController::class, 'update'])->name('simupdate');


//job card
Route::get('/jobcard',[JobcardController::class,'index']);
Route::post('/jobcard',[JobcardController::class,'submit'])->name('jobcard.create');



Route::get('/generate-pdf/{id}', [ReportController::class, 'show']);


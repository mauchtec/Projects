<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Barryvdh\Snappy\Facades\SnappyPdf;
use App\Http\Controllers\SimController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\JobcardController;

use App\Http\Controllers\DistanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Distance;

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
Route::get('/jobcard/{id}',[JobcardController::class,'show']);




Route::get('/upload', [ReportController::class, 'index']);
Route::post('/done', [ReportController::class, 'store'])->name('done');

Route::get('/generate-pdf', function () {
    $pdf = SnappyPDF::loadView('jobcard.text');
    return $pdf->download('document.pdf');
});


Route::get('/ticket',[TicketController::class, 'index']);
Route::post('/ticket',[TicketController::class, 'store'])->name('ticket');
Route::get('/siteticket',[TicketController::class, 'show'])->name('siteticket');

///

Route::get('/calculate-distance', [DistanceController::class, 'calculateDistance']);
Route::get('/map', [DistanceController::class, 'index']);
Route::get('/expense-dashbord', [DistanceController::class, 'dashboard']);
Route::post('/map', [DistanceController::class, 'store'])->name('map');
Route::delete('map/{id}',[DistanceController::class, 'Delete']);

Route::post('/receipt', [DistanceController::class, 'receipt'])->name('receipt');







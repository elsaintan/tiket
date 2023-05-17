<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('get/details/{id}', [WelcomeController::class, 'getDetails'])->name('getDetails');
Route::post('/data/send', [WelcomeController::class, 'store']);
Route::resource('/dashboard/tickets', AdminController::class)->except('getDeatils')->middleware('auth');
Route::get('/dashboard/laporan', [AdminController::class, 'laporan'])->name('laporan');

Route::get('/dashboard/checkIn', function () {
    return view('checkIn');
});

Route::post('/dashboard/get/details', [AdminController::class, 'getDetails'])->name('getTiket');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


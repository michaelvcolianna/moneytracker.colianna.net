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

Route::middleware(['auth'])->group(function() {
    Route::get('/', function() {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/pay-periods', function() {
        return view('pages.pay-periods');
    })->name('pay-periods');

    Route::get('/payees', function() {
        return view('pages.payees');
    })->name('payees');
});

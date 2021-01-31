<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\PayPeriods;

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

Route::redirect('/', '/dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/pay-periods', PayPeriods::class)->name('pay_periods');
});

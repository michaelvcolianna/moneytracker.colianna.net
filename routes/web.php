<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
Route::redirect('/register', '/');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', [Controller::class, 'showDashboard'])->name('dashboard');
    Route::get('/pay-periods', [Controller::class, 'showPayPeriods'])->name('pay-periods');
    Route::get('/payees', [Controller::class, 'showPayees'])->name('payees');
    Route::get('/schedule', [Controller::class, 'showSchedule'])->name('schedule');
});

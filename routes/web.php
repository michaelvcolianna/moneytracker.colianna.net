<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Livewire\Entries;
use App\Livewire\Forecast;
use App\Livewire\Payees;
use App\Models\Payday;
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

Route::middleware(['auth', 'payday'])->group(function() {
    Route::get('/entries', Entries::class)->name('entries');

    Route::get('/forecast', Forecast::class)->name('forecast');

    Route::get('/payees', Payees::class)->name('payees');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::redirect('/', '/login');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

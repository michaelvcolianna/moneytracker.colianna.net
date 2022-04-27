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

Route::middleware(['auth', 'paydate'])->group(function() {
    Route::view('/', 'pages.dashboard')->name('dashboard');
    Route::view('/forecast', 'pages.forecast')->name('forecast');
    Route::view('/pay-periods', 'pages.pay-periods')->name('pay-periods');
    Route::view('/payees', 'pages.payees')->name('payees');
});

Route::get('/svg', function() {
    $name = 'components.svg.' . request()->query('name');

    abort_unless(view()->exists($name), 404);

    $queryFill = request()->query('fill', 'currentColor');
    $fill = ctype_xdigit($queryFill)
        ? '#' . $queryFill
        : $queryFill
        ;

    $icon = view('components.shared.icon', [
        'name' => $name,
        'fill' => $fill,
        'height' => request()->query('height', 16),
        'width' => request()->query('width', 16),
        'attributes' => null,
    ])->render();

    return response($icon)->header('Content-Type', 'image/svg+xml');
});

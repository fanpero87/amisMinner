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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });


    Route::get('/minners', [App\Http\Controllers\MinnersController::class, 'index'])->name('minner.index');
    Route::post('/minners', [App\Http\Controllers\MinnersController::class, 'store'])->name('minner.store');
});


require __DIR__ . '/auth.php';

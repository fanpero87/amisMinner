<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinnersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MinnersController::class, 'index'])->name('chart.index');
Route::post('/', [MinnersController::class, 'store'])->name('chart.store');

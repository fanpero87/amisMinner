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

// Route::get('/', [App\Charts\MinnersChart::class, 'handler'])->name('api.chart');

Route::get('/', [MinnersController::class, 'index'])->name('chartjs.index');

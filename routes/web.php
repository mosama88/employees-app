<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|$2y$10$f7XR1hcw5caS6tEU1pXd6.sPPLlzb.4TjPZwKoFlI6966GZGFqvYK
*/

Route::get('/', function () {
    return view('dashboard.user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});


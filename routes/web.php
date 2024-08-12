<?php

use App\Http\Controllers\BaseballGameController;
use App\Http\Controllers\ParenthesesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('admin/users', UserController::class);
    
    // valid parentheses
    Route::get('/valid-parentheses', [ParenthesesController::class, 'showForm'])->name('valid.parentheses.form');
    Route::post('/valid-parentheses', [ParenthesesController::class, 'validParentheses'])->name('valid.parentheses');
    
    // BaseBall game route
    Route::get('/baseball-game', [BaseballGameController::class, 'showBaseballForm'])->name('show.form');
    Route::post('/baseball-game', [BaseballGameController::class, 'calculateGameScore'])->name('calculate.score');
});

// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('profile');
});

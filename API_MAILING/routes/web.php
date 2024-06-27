<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;

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
    return view('mailWelcome');
});



// Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');



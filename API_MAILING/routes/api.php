<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\apiController;

use App\Http\Controllers\Auth\ResetPasswordController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('chemin/laravel_api')->group(function(){
    Route::post('/register', [apiController::class, 'register']);
    Route::post('/login', [apiController::class, 'login']);
    Route::post('/password-reset', [apiController::class, 'sendPasswordResetLink']);
    Route::get('/get-email/{token}', [apiController::class, 'getEmailByToken']);
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

    Route::get('/reset-password/{user_id}', [ResetPasswordController::class, 'showResetForm'])->name('password.mailWelcome');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
    
    Route::get('/', [apiController::class, 'get']);
    Route::post('/', [apiController::class, 'create']);
    Route::get('/{id}', [apiController::class, 'getById']);
    Route::put('/{id}', [apiController::class, 'update']);
    Route::delete('/{id}', [apiController::class, 'delete']);
});




//

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/**
 * Auth Routes
 */
Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);
Route::get('/v1/login', [AuthController::class, 'login'])->name('login');

/**
 * Route Projects.
 */
Route::prefix('v1')->middleware(['client-credentials'])->group(function () {
  Route::get('/projects', [ProjectController::class, 'index']);
});

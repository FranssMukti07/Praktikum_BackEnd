<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routing Animals

Route::get('/animals', [AnimalController::class, "index"]);

Route::post('/animals', [AnimalController::class, "store"]);

Route::put('/animals/{id}', [AnimalController::class, "update"]);

Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);

/**
 * Middleware
 * Sanctum Authentication
 */

Route::middleware(['auth:sanctum'])->group(function () {
    // Routing Students
    
    Route::get('/students', [StudentController::class, "index"]);
    
    Route::get('/students/{id}', [StudentController::class, "show"]);
    
    Route::post('/students', [StudentController::class, "store"]);
    
    Route::put('/students/{id}', [StudentController::class, "update"]);
    
    Route::delete('/students/{id}', [StudentController::class, "destroy"]);
});

// Routing Authentication

Route::post('/register', [AuthController::class, "register"]);

Route::post('/login', [AuthController::class, "login"]);
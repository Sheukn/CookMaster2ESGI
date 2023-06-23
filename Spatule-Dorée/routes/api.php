<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController; // Import correct de la classe UsersController

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UsersController::class, 'index']); // Récupérer tous les utilisateurs
    Route::post('/', [UsersController::class, 'store']); // Créer un nouvel utilisateur
    Route::get('/{user}', [UsersController::class, 'show']); // Récupérer un utilisateur par son ID
    Route::put('/{user}', [UsersController::class, 'update']); // Mettre à jour un utilisateur par son ID
    Route::delete('/{user}', [UsersController::class, 'destroy']); // Supprimer un utilisateur par son ID
});

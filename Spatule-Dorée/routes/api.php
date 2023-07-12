<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\GetController;


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


// Route::get('/users', function () {
//     return UserResource::collection(User::all());
// });

Route::get('/auth/checkToken', [GetController::class, 'checkToken']);
Route::get('/auth/getUserData', [GetController::class, 'getUserData']);
Route::get('/users', [GetController::class, 'getAllUsers']);
Route::get('/recipes', [GetController::class, 'getRecipes']);
Route::get('/recipes/{gastronomy}', [GetController::class, 'getRecettesByGastronomy']);
Route::get('/recipe/{id}', [GetController::class, 'getRecetteById']);


Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');

<?php

namespace App\Http\Controllers\Api;



use App\Models\User;
use App\Models\Recipe;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class GetController extends Controller{


    public function getUserData(Request $request){
        try {
            $authorizationHeader = $request->header('Authorization');

            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();

                if ($user) {
                    return response()->json($user);
                }
            }

            return response()->json(['error' => 'Invalid token'], 401);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function checkToken(Request $request){
        try {
            $authorizationHeader = $request->header('Authorization');

            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();

                if ($user) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Token is valid',
                    ], 200);
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Token is invalid',
            ], 401);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAllUsers(Request $request){
        try {
            $authorizationHeader = $request->header('Authorization');
            
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);
                $user = User::where('api_token', $token)->first();

                if($user->is_admin == 1){
                    $users = User::all();
                    return response()->json([
                        'status' => true,
                        'data' => $users
                    ], 200);
                }   
            }

            return response()->json([
                'status' => false,
                'message' => 'Token is invalid',
            ], 401);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function getRecipes(Request $request){
        try {
            $authorizationHeader = $request->header('Authorization');
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();

                if($user){
                    $recipe = Recipe::all();
                    return response()->json([
                        'status' => true,
                        'data' => $recipe
                    ], 200);
                }   
            }

            return response()->json([
                'status' => false,
                'message' => 'Token is invalid',
            ], 401);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    public function getRecettesByGastronomy(Request $request, $gastronomy){
    // Récupère les recettes avec l'origine spécifiée
        try {
            $authorizationHeader = $request->header('Authorization');
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();

                if($user){
                    $recettes = Recipe::where('gastronomy', $gastronomy)->get();
                    return response()->json([
                        'status' => true,
                        'data' => $recettes
                    ], 200);
                }   
            }
 
            return response()->json([
                'status' => false,
                'message' => 'Token is invalid',
            ], 401);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getRecetteById(Request $request, $id){
        try{
            $authorizationHeader = $request->header('Authorization');
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();
                if($user){
                    $recette = Recipe::where('id', $id)->first();
                    // Get ingredients list from pivot table recipes_has_ingredients
                    $recette->ingredients = $recette->ingredients()->get();
                    return response()->json([
                        'status' => true,
                        'data' => $recette
                    ], 200);
                }
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getSubscriptions(Request $request){
        try{
            $authorizationHeader = $request->header('Authorization');
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);
                $user = User::where('api_token', $token)->first();
                if($user){
                    $subscription = $user->subscriptions()->first();
                    return response()->json([
                        'status' => true,
                        'data' => $subscription
                    ], 200);
                }
        }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }   
}
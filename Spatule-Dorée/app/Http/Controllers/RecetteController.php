<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function getRecettesByCountry(Request $request, $country)
{
    // Récupère les recettes avec l'origine spécifiée
        try {
            $authorizationHeader = $request->header('Authorization');
            if (!empty($authorizationHeader) && strpos($authorizationHeader, 'Bearer ') === 0) {
                $token = substr($authorizationHeader, 7);

                $user = User::where('api_token', $token)->first();

                if($user){
                    $recettes = Recette::where('gastronomy', $country)->get();
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
}

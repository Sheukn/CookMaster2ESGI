<?php

namespace App\Http\Controllers\Api;



use App\Models\User;

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
}
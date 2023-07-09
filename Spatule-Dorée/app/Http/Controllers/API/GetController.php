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
        $token = $request->token;

        $user = User::where('remember_token', $token)->first();

        if($user){
            return response()->json([
                'status' => true,
                'data' => $user
            ]);
        }
    }


    public function checkToken(Request $request){

        try {

            $token = $request->token;

            $user = User::where('remember_token', $token)->first();

            if ($user) {

                return response()->json([

                    'status' => true,

                    'message' => 'Token is valid',

                ], 200);
            } else {

                return response()->json([

                    'status' => false,

                    'message' => 'Token is invalid',

                ], 401);
            }
        } catch (\Throwable $th) {

            return response()->json([

                'status' => false,

                'message' => $th->getMessage()

            ], 500);
        }
    }
}
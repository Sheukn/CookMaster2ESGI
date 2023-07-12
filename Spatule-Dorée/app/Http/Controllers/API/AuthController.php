<?php

namespace App\Http\Controllers\Api;



use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;




class AuthController extends Controller

{

    /**

     * Create User

     * @param Request $request

     * @return User

     */

    public function createUser(Request $request)

    {

        try {

            //Validated

            $validateUser = Validator::make(

                $request->all(),

                [

                    'firstname' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:255'],
                    'postal_code' => ['required', 'int', 'min:5'],
                    'city' => ['required', 'string', 'max:255'],
                    'country' => ['required', 'string', 'max:255'],
                    'phone' => ['required', 'numeric', 'min:10'],
                    'email' => ['required', 'string', 'email', 'unique:users'],
                    'password' => 'required',


                ]

            );



            if ($validateUser->fails()) {

                return response()->json([

                    'status' => false,

                    'message' => 'validation error',

                    'errors' => $validateUser->errors()

                ], 401);
            }



            $user = User::create([

                'firstname' => $request->firstname,
                'name' => $request->name,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'country' => $request->country,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),



            ]);



            return response()->json([

                'status' => true,

                'message' => 'User Created Successfully',

                'token' => $user->createToken("API TOKEN")->plainTextToken

            ], 200);
        } catch (\Throwable $th) {

            return response()->json([

                'status' => false,

                'message' => $th->getMessage()

            ], 500);
        }
    }



    /**

     * Login The User

     * @param Request $request

     * @return User

     */

    public function loginUser(Request $request)

    {

        try {

            $validateUser = Validator::make(

                $request->all(),

                [

                    'email' => 'required',

                    'password' => 'required'

                ]

            );



            if ($validateUser->fails()) {

                return response()->json([

                    'status' => false,

                    'message' => 'validation error',

                    'errors' => $validateUser->errors()

                ], 401);
            }



            if (!Auth::attempt($request->only(['email', 'password']))) {

                return response()->json([

                    'status' => false,

                    'message' => 'Email & Password does not match with our record.',

                ], 401);
            }


            $token = Str::random(32);
            $insertToken = User::where('email', $request->email)->update(['api_token' => $token]);
            $user = User::where('email', $request->email)->first();
            $fetchToken = $user->api_token;
            $fetchIsAdmin = $user->is_admin;



            return response()->json([

                'status' => true,

                'message' => 'User Logged In Successfully',

                'token' => $fetchToken,

                'is_admin' => $fetchIsAdmin

            ], 200);
        } catch (\Throwable $th) {

            return response()->json([

                'status' => false,

                'message' => $th->getMessage()

            ], 500);
        }
    }

    public function logoutUser(Request $request)

    {

        try {

            $request->user()->tokens()->delete();



            return response()->json([

                'status' => true,

                'message' => 'User Logged Out Successfully'

            ], 200);
        } catch (\Throwable $th) {

            return response()->json([

                'status' => false,

                'message' => $th->getMessage()

            ], 500);
        }
    }

}

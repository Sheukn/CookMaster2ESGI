<?php



namespace App\Http\Controllers\Api;



use App\Models\Post;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class PostController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $posts = Post::all();

        return response()->json([

            'status' => true,

            'data' => $posts

        ]);
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $validatePost = Validator::make(

            $request->all(),

            [
                'firstname' => ['required', 'string', 'max:255'],
                'name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'country' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'

            ]

        );



        if ($validatePost->fails()) {

            return response()->json([

                'status' => false,

                'message' => 'Validation error',

                'errors' => $validatePost->errors()

            ], 401);
        }



        $post = Post::create([

            'firstname' => $request->firstname,
            'name' => $request->name,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => Auth::id()

        ]);



        return response()->json([

            'status' => true,

            'message' => 'Post created successfully',

            'data' => $post

        ]);
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $post = Post::find($id);



        if (!$post) {

            return response()->json([

                'status' => false,

                'message' => 'Post not found'

            ], 404);
        }



        return response()->json([

            'status' => true,

            'data' => $post

        ]);
    }

    /**
<<<<<<< HEAD
=======
     * Get all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers()
    {
        //Get id , firstname, name, email, address
        $users = User::all()->map(function ($user) {
            return [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,

            ];
        });

        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }


    /**
>>>>>>> cc4c096788c3c2879c45077ddb0f15cb78599428

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $validatePost = Validator::make(

            $request->all(),

            [
                'firstname' => ['required', 'string', 'max:255'],
                'name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'country' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'

            ]

        );



        if ($validatePost->fails()) {

            return response()->json([

                'status' => false,

                'message' => 'Validation error',

                'errors' => $validatePost->errors()

            ], 401);
        }



        $post = Post::find($id);



        if (!$post) {

            return response()->json([

                'status' => false,

                'message' => 'Post not found'

            ], 404);
        }



        $post->title = $request->title;

        $post->content = $request->content;

        $post->save();



        return response()->json([

            'status' => true,

            'message' => 'Post updated successfully',

            'data' => $post

        ]);
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $post = Post::find($id);



        if (!$post) {

            return response()->json([

                'status' => false,

                'message' => 'Post not found'

            ], 404);
        }



        $post->delete();



        return response()->json([

            'status' => true,

            'message' => 'Post deleted successfully'

        ]);
    }
}

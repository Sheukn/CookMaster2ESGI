<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $users = User::paginate(10);

        // On retourne les informations des utilisateurs en JSON
        return UserResource::collection($users);
    }

    public function store(UserStoreRequest $request)
    {
        // On crée un nouvel utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'firstname' => $request->input('firstname'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($user, 201);
    }

    public function show($id)
    {
        // On retourne les informations de l'utilisateur en JSON
        return new UserResource($id);
    }

    public function update(UserStoreRequest $request, User $user)
    {
        // On vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json(['error' => 'Utilisateur introuvable.'], 404);
        }

        // On modifie les informations de l'utilisateur
        $user->update([
            'name' => $request->input('name'),
            'firstname' => $request->input('firstname'),
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // On retourne la réponse JSON
        return response()->json();
    }

    public function destroy(User $user)
    {
        // On vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json(['error' => 'Utilisateur introuvable.'], 404);
        }

        // On supprime l'utilisateur
        $user->delete();

        // On retourne la réponse JSON
        return response()->json();
    }
}

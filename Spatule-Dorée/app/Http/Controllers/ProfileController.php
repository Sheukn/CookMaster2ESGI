<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.profile')->with('user', $user);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.profileSettings')->with('user', $user);
    }

    public function updateProfile(Request $request, User $user)
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $request->validate([
                'firstname' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'postal_code' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                // Ajoutez d'autres règles de validation selon vos besoins
            ]);

            $user->firstname = $request->firstname;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->postal_code = $request->postal_code;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->email = $request->email;
            // Mettez à jour d'autres champs selon vos besoins

            $user->save();

            return redirect()->route('users.profile.show')->with('success', 'Profil mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Vous devez être connecté pour mettre à jour votre profil.');
        }
    }
}

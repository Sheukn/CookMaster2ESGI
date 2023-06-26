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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        $user->firstname = $request->firstname;
        $user->name = $request->name;
        $user->email = $request->email;
        // Mettez à jour d'autres champs selon vos besoins

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès.');
    }
}

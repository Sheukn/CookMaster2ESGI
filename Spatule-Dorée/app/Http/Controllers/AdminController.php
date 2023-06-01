<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        // Valider les données entrées par l'utilisateur
        $request->validate([
            'firstname' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        // Créer un nouvel administrateur
        $admin = new Admin;
        $admin->firstname = $request->input('firstname');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();

        // Rediriger vers une page de succès ou effectuer d'autres actions
        return redirect()->route('admin.dashboard')->with('success', 'Le compte administrateur a été créé avec succès.');
    }
}

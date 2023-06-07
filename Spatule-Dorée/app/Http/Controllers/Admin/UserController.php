<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Importer le modèle User si nécessaire

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Récupérer tous les utilisateurs depuis la base de données

        return view('admin.users.index', compact('users')); // Afficher une vue avec la liste des utilisateurs
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create'); // Afficher le formulaire de création d'un nouvel utilisateur
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create($data); // Créer un nouvel utilisateur dans la base de données

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'User created successfully.'); // Rediriger vers la page de détails de l'utilisateur avec un message de succès
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        return view('admin.users.show', compact('user')); // Afficher une vue avec les détails de l'utilisateur
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        return view('admin.users.edit', compact('user')); // Afficher le formulaire de modification de l'utilisateur
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        $user->update($data); // Mettre à jour les informations de l'utilisateur dans la base de données

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'User updated successfully.'); // Rediriger vers la page de détails de l'utilisateur avec un message de succès
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        $user->delete(); // Supprimer l'utilisateur de la base de données

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.'); // Rediriger vers la liste des utilisateurs avec un message de succès
    }

    /**
     * Ban the specified user.
     */
    public function ban(string $id)
    {
        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        $user->is_banned = true; // Marquer l'utilisateur comme banni
        $user->save(); // Sauvegarder les modifications dans la base de données

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'User banned successfully.'); // Rediriger vers la page de détails de l'utilisateur avec un message de succès
    }
}

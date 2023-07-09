<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // Logique de contrôleur pour le tableau de bord administrateur
        return view('dashboard'); // Retourne la vue du tableau de bord administrateur
    }

    public function index()
    {
        $users = User::all(); // Fetch all users from the database
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create'); // Afficher le formulaire de création d'un nouvel utilisateur
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($data); // Créer un nouvel utilisateur dans la base de données

        return redirect()->route('admin.users.show', $user->id)
            ->with('success', 'User created successfully.'); // Rediriger vers la page de détails de l'utilisateur avec un message de succès
    }

    public function show(User $user)
    {
        $user = User::findOrFail($user); // Trouver l'utilisateur correspondant à l'ID fourni

        return view('admin.users.show', compact('user')); // Afficher une vue avec les détails de l'utilisateur
    }

    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            abort(403, "Vous n'avez pas l'autorisation.");
        };

        $roles = Role::all();

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);
        $user->firstname = $request->firstname;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')) {
            abort(403, "Vous n'avez pas l'autorisation.");
        };

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->with('Success', 'Utilisateur supprimé avec succès');
    }

    public function ban($id)
    {
        $user = User::findOrFail($id); // Trouver l'utilisateur correspondant à l'ID fourni

        $user->is_banned = true; // Marquer l'utilisateur comme banni
        $user->save(); // Sauvegarder les modifications dans la base de données

        return redirect()->route('users.show', $user->id)
            ->with('success', 'User banned successfully.'); // Rediriger vers la page de détails de l'utilisateur avec un message de succès
    }
}

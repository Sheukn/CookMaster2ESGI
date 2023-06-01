<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Vérifiez si l'utilisateur est connecté
        if (Auth::check()) {
            // Vous pouvez accéder à l'utilisateur connecté via Auth::user()
            $user = Auth::user();

            // Afficher la vue du tableau de bord avec les données de l'utilisateur
            return view('auth.dashboard', ['user' => $user]);
        }

        // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
        return redirect()->route('login.authenticate')->withErrors([
            'email' => 'Please log in to access the dashboard.',
        ])->withInput();
    }
}

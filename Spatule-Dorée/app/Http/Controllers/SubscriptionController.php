<?php

// app/Http/Controllers/Admin/SubscriptionController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        Subscription::create($validatedData);

        return redirect()->route('admin.subscriptions.index')
            ->with('success', 'Abonnement créé avec succès.');
    }

    // Autres méthodes pour afficher, mettre à jour et supprimer les abonnements
}

<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $events = Events::with('users')->get();
        return view('admin.events.eventsList', compact('events'));
    }

    public function show(Events $event)
    {

        $event = Events::findOrFail($event);
        return view('events.show', compact('event'));
    }

    public function create()
    {

        return view('admin.events.eventsCreate');
    }

    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }

    public function edit(Events $event)
    {
        return view('events.edit', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'max:255',
            'start_event' => 'required|date',
            'end_event' => 'required|date|after:start_event',
            'is_physics' => 'required|boolean',
            'diploma_title' => 'required|string|max:255',
            'diploma_validity' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imagePath = $image->store('public/image_path'); // Stockage de l'image dans le dossier "storage/app/public/img"

            Events::create([
                'name' => $request->name,
                'description' => $request->description,
                'start_event' => $request->start_event,
                'end_event' => $request->end_event,
                'is_physics' => 1,
                'image_path' => $imagePath, // Enregistrement du chemin d'accès de l'image dans la base de données
            ]);
        }

        return redirect()->route('admin.events.create');
    }



    public function update(Request $request, Events $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'max:255',
            'start_event' => 'required|date',
            'end_event' => 'required|date|after:start_event',
            'is_physics' => 'required|boolean',
        ]);

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_event' => $request->start_event,
            'end_event' => $request->end_event,
            'is_physics' => $request->is_physical,
        ]);

        return redirect()->route('events.index');
    }

    // fonction pour afficher les événements de l'utilisateur connecté
    public function myEvents()
    {
        $events = Events::with('users')->get();
        return view('events.myEvents', compact('events'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
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
            'is_physical' => 'required|boolean',
        ]);

        Events::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_event' => $request->start_event,
            'end_event' => $request->end_event,
            'is_physical' => $request->is_physical,
        ]);

        return redirect()->route('events.index');
    }

    public function update(Request $request, Events $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'max:255',
            'start_event' => 'required|date',
            'end_event' => 'required|date|after:start_event',
            'is_physical' => 'required|boolean',
        ]);

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_event' => $request->start_event,
            'end_event' => $request->end_event,
            'is_physical' => $request->is_physical,
        ]);

        return redirect()->route('events.index');
    }
}

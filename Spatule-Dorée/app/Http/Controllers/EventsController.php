<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all()->load('users');
        //dd($events);
        return view('events.events', [

            'events' => $events
        ]);
    }
}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $event->name }}</div>

            <div class="card-body">
                <p>Description : {{ $event->description }}</p>
                <p>Date de début : {{ $event->start_event }}</p>
                <p>Date de fin : {{ $event->end_event }}</p>
                <p>Événement physique : {{ $event->is_physical ? 'Oui' : 'Non' }}</p>
            </div>
        </div>
    </div>
@endsection

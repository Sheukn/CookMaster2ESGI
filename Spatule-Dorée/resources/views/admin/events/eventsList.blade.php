@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des événements</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Événement physique</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->start_event }}</td>
                                    <td>{{ $event->end_event }}</td>
                                    <td>{{ $event->is_physical ? 'Oui' : 'Non' }}</td>
                                    <td>
                                        <a href="{{ route('admin.events.show', $event) }}" class="btn btn-primary">Voir</a>
                                        <a href="{{ route('admin.events.edit', $event) }}"
                                            class="btn btn-secondary">Modifier</a>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

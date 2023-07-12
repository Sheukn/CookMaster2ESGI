@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un événement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nom de l'événement</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description de l'événement</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="start_event">Date de début</label>
                                <input type="date" class="form-control" id="start_event" name="start_event" required>
                            </div>

                            <div class="form-group">
                                <label for="end_event">Date de fin</label>
                                <input type="date" class="form-control" id="end_event" name="end_event" required>
                            </div>

                            <div class="form-group">
                                <label for="is_physics">Événement physique</label>
                                <select class="form-control" id="is_physics" name="is_physics" required>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="diploma_title">Intitulé du diplôme</label>
                                <input type="text" class="form-control" id="diploma_title" name="diploma_title" required>
                            </div>

                            <div class="form-group">
                                <label for="diploma_validity">Durée de validité du diplôme</label>
                                <input type="text" class="form-control" id="diploma_validity" name="diploma_validity"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="images">Images de l'événement</label>
                                <input type="file" class="form-control" id="images" name="images" multiple>
                            </div>

                            <div class="form-group">
                                <label for="image_preview">Aperçu de l'image</label>
                                @if (isset($event) && $event->image_path)
                                    <img src="{{ $event->image_path }}" alt="Image de l'événement" id="image_preview"
                                        style="max-width: 200px; max-height: 200px;">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" alt="Aucune image sélectionnée"
                                        id="image_preview" style="max-width: 200px; max-height: 200px;">
                                @endif
                            </div>

                            <div class="form-group" style="margin-top: 10px;">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

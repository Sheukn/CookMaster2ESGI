@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des certifications') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certifications as $certification)
                                    <tr>
                                        <td>{{ $certification->user_id }}</td>
                                        <td>{{ $certification->created_at }}</td>
                                        <td>
                                            <a href="{{ route('certifications.download', $certification->event_id) }}"
                                                class="btn btn-primary">Certification de formations</a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

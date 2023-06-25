@extends('auth.layouts')
@section('title', 'Administrsation')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Utilisateurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Paramètres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group">
                    <li class="list-group-item">Tableau de bord</li>
                    <li class="list-group-item">Utilisateurs</li>
                    <li class="list-group-item">Articles</li>
                    <li class="list-group-item">Paramètres</li>
                </ul>
            </div>
            <div class="col-lg-9">
                <h1>Contenu de la page d'administration</h1>
                <p>Ceci est la page d'administration de votre application.</p>
            </div>
        </div>
    </div>
@endsection

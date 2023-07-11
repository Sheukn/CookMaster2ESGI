@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/plan.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <div class="container">
        <section>
            <div class="container py-5">

                <header class="text-center mb-5 text-white">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <h1 class="display-4">Nos formules</h1>
                        </div>
                    </div>
                </header>

                <div class="row text-center align-items-end">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">Formule Gratuite</h1>
                            <h2 class="h1 font-weight-bold">0€<span class="text-small font-weight-normal ml-2">/
                                    gratuit</span></h2>

                            <div class="custom-separator my-4 mx-auto bg-primary"></div>

                            <ul class="list-unstyled my-5 text-small text-left">
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Présence de publicités dans le contenu
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Commenter publier un avis
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès aux leçons : 1 par jour
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Accès au service de tchat avec un chef</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Réduction permanente de 5% dans la boutique</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Livraison offerte sur la boutique</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Accès au service de location d'espace de cuisine</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Invitation à des évènements exclusifs (dégustation, rencontres, ventes
                                        privées...)</del>
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Récompense cooptation nouvel inscrit</del>
                                </li>
                            </ul>
                            <a href="{{ route('subscription', ['plan' => 'freePlan']) }}"
                                class="btn btn-primary btn-block shadow rounded-pill">Souscrire</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">Abonnement Premium</h1>
                            <h2 class="h1 font-weight-bold">9,99€ <span class="text-small font-weight-normal ml-2">/
                                    mois</span></h2>
                            <h2 class="h1 font-weight-bold">ou 113€<span class="text-small font-weight-normal ml-2">/
                                    an</span></h2>

                            <div class="custom-separator my-4 mx-auto bg-primary"></div>

                            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Présence de publicités dans le contenu</del>
                                </li>
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Commenter publier un avis
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès aux leçons : 5 par jour
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès au service de tchat avec un chef
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Réduction permanente de 5% dans la boutique</del>
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Livraison offerte sur la boutique:
                                    uniquement en point relai
                                </li>
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Accès au service de location d'espace de cuisine</del>
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Invitation à des évènements exclusifs
                                    (dégustation, rencontres, ventes privées...)
                                </li>
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Récompense cooptation nouvel inscrit :
                                    Chèque cadeau de 5€ tous les 3 nouveaux inscrits (hors formule Free)
                                </li>
                            </ul>
                            <a href="{{ route('subscription', ['plan' => 'starterPlan']) }}"
                                class="btn btn-primary btn-block shadow rounded-pill">Souscrire</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">Abonnement Pro</h1>
                            <h2 class="h1 font-weight-bold">19,99€<span class="text-small font-weight-normal ml-2">/
                                    mois</span></h2>
                            <h2 class="h1 font-weight-bold">ou 220€<span class="text-small font-weight-normal ml-2">/
                                    an</span></h2>

                            <div class="custom-separator my-4 mx-auto bg-primary"></div>

                            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Présence de publicités dans le contenu</del>
                                </li>
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Commenter publier un avis
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès illimité aux leçons
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès au service de tchat avec un chef
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Réduction permanente de 5% dans la
                                    boutique
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Livraison offerte sur la boutique
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Accès au service de location d'espace de
                                    cuisine
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Invitation à des évènements exclusifs
                                    (dégustation, rencontres, ventes privées...)
                                </li>
                                <li class="mb-3">
                                    <i class="fa fa-check mr-2 text-primary"></i> Récompense cooptation nouvel inscrit :
                                    Chèque cadeau de 5€ pour chaque nouvel inscrit (hors formule Free) + bonus de 3% du
                                    montant sur le total de la première
                                </li>
                            </ul>
                            <a href="{{ route('subscription', ['plan' => 'masterPlan']) }}"
                                class="btn btn-primary btn-block shadow rounded-pill">Souscrire</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

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
                            <h1>Laravel 9 Cashier Stripe Subscription</h1>
                            <h3>PRICING</h3>
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
                                <li class="mb-3 text-muted">
                                    <i class="fa fa-times mr-2"></i>
                                    <del>Bonus de renouvellement de l'abonnement </del>
                                </li>

                            </ul>
                            <a href="#" class="btn btn-primary btn-block shadow rounded-pill">Souscrire</a>
                        </div>
                    </div>

                    @foreach ($plans as $plan)
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="bg-white p-5 rounded-lg shadow">
                                <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan->name }}</h1>
                                <h2 class="h1 font-weight-bold">{{ $plan->price }}€<span
                                        class="text-small font-weight-normal ml-2">/ mois</span></h2>

                                <div class="custom-separator my-4 mx-auto bg-primary"></div>

                                <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i>
                                    </li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis
                                    </li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> At vero eos et
                                        accusamus
                                    </li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> Nam libero tempore
                                    </li>
                                    <li class="mb-3">
                                        <i class="fa fa-check mr-2 text-primary"></i> Sed ut perspiciatis
                                    </li>
                                    <li class="mb-3 text-muted">
                                        <i class="fa fa-times mr-2"></i>
                                        <del>Sed ut perspiciatis</del>
                                    </li>
                                </ul>
                                <a href="{{ route('plans.show', $plan->slug) }}"
                                    class="btn btn-primary btn-block shadow rounded-pill">Souscrire</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
@endsection

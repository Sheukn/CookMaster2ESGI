@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/subscribe.css') }}" />
    <section id="pricing" class="pricing-content section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h1>Abonnements</h1>
                <p>Rejoignez notre communauté gastronomique et laissez la magie de la cuisine opérer avec nos cours en
                    ligne, réservés exclusivement aux passionnés.
                    Abonnez-vous dès maintenant pour découvrir des recettes inspirantes, des techniques de chefs renommés et
                    un voyage culinaire sans fin.</p>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>Free</h2>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <h1 class="price">0</h1>
                        <h5>/mois</h5>
                        <ul>
                            <li>Accès à une sélection de cours de cuisine de base pour les débutants.</li>
                            <li>Consultation limitée de la bibliothèque de recettes, avec un nombre restreint de recettes
                                disponibles.</li>
                            <li>Support en ligne limité de la part du professeur.</li>
                            <li>Des cours en ligne limité.</li>
                        </ul>
                        <a href="">Get start</a>
                    </div>
                </div>
                <!--- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>Premium</h2>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <h1 class="price">$49</h1>
                        <h5>Monthly</h5>
                        <ul>
                            <li>Accès illimité à une grande variété de cours de cuisine</li>
                            <li>Accès complet à la bibliothèque de recettes, comprenant des milliers de recettes organisées
                                par catégories.</li>
                            <li>Sessions de discussion en ligne avec le professeur pour poser des questions et obtenir des
                                conseils personnalisés.</li>
                            <li>Support technique prioritaire en cas de problèmes techniques.</li>

                        </ul>
                        <a href="">Get start</a>
                    </div>
                </div>
                <!--- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
                    data-wow-offset="0">
                    <div class="single-pricing single-pricing-white">
                        <div class="price-head">
                            <h2>Super Premium</h2>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span class="price-label">Best</span>
                        <h1 class="price">$69</h1>
                        <h5>Monthly</h5>
                        <ul>
                            <li>Accès exclusif à des cours de cuisine avancés dispensés par des chefs renommés.</li>
                            <li>Accès complet et illimité à une bibliothèque de recettes haut de gamme</li>
                            <li>Sessions de coaching individuelles avec le professeur</li>
                            <li>Accès à des événements spéciaux en ligne</li>
                            <li>Support technique prioritaire et assistance personnalisée garantie</li>

                        </ul>
                        <a href="">Get start</a>
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
@endsection

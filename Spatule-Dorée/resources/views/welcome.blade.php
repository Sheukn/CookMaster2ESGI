<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font awesome cdn CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}" />
    <link rel="stylesheet" href="{{ asset('favicon.ico') }}" />

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>@yield('title', 'Accueil')</title>
</head>

<body>
    @include('front.navbarAccueil')


    <div class="banner d-flex justify-content-center align-items-center pt-5">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 banner-desc lh-lg">
                    <h1 class="text-capitalize py-3 redressed">
                        Réservez votre atelier culinaire et découvrez de nouvelles saveurs!
                    </h1>
                    <p>
                        <button type="button" class="btn btn-outline-warning">Commander maintenant</button>
                        <button class="btn btn-outline-warning">Réserver</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="available merriweather py-5">
        <div class="container">
            <div class="row">
                <div class="card mb-3 border-0 rounded-0">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/atelier-cuisine.jpg.webp') }}" class="img-fluid" alt="..." />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body px-0">
                                <h3 class="text-center card-title">Nos cours de cuisine</h3>
                                <p class="card-text">
                                    Venez apprendre les secrets de la cuisine avec nos chefs professionnels et découvrez
                                    de nouvelles saveurs à travers des cours interactifs et personnalisés.
                                </p>
                                <p class="card-text"><a href="#" class="btn btn-outline-warning">Réservez</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card my-5 border-0 rounded-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body px-0">
                                <h3 class="text-center card-title">Réservez dès maintenant notre salle de cuisine
                                    équipée
                                    pour vos cours culinaires !</h3>
                                <p class="card-text">
                                    Découvrez notre sélection de salles de cours de cuisine et réservez dès maintenant
                                    pour
                                    des expériences culinaires inoubliables !
                                </p>
                                <p class="card-text"><a href="#" class="btn btn-outline-warning">Réservez !</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('img/carousel/local-atelier.jpeg') }}" class="d-block w-100"
                                            alt="..." />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/carousel/local-atelier2.jpeg') }}" class="d-block w-100"
                                            alt="..." />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/carousel/local-atelier3.jpeg') }}" class="d-block w-100"
                                            alt="..." />
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Précédent</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Suivant</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 rounded-0">
                    <img src="{{ asset('img/professional-training.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">Formation professionnelle</h5>
                        <p class="card-text">
                            Bénéficiez d'une formation professionnelle en cuisine pour améliorer vos compétences et
                            ouvrir de nouvelles perspectives de carrière.
                        </p>
                        <p class="card-text"><a href="#" class="btn btn-outline-warning">En savoir plus</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-0">
                    <img src="{{ asset('img/menu-varieties.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">Variétés de menus</h5>
                        <p class="card-text">
                            Découvrez notre large choix de menus adaptés à tous les goûts et occasions spéciales. Nos
                            chefs créent des plats savoureux et uniques pour vous satisfaire.
                        </p>
                        <p class="card-text"><a href="#" class="btn btn-outline-warning">Voir les menus</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-0">
                    <img src="{{ asset('img/kitchen-facilities.jpg') }}" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">Installations de cuisine</h5>
                        <p class="card-text">
                            Profitez de nos installations de cuisine modernes et bien équipées pour vos cours de
                            cuisine,
                            événements privés et activités culinaires.
                        </p>
                        <p class="card-text"><a href="#" class="btn btn-outline-warning">Découvrir</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="order-form mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card border-0 rounded-0">
                        <div class="card-body">
                            <h3 class="card-title text-center">Commandez dès maintenant</h3>
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse e-mail</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-warning">Commander</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    @include('front.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>

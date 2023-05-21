<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font awesome cdn CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('favicon.ico') }}" />

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>@yield('title', 'Accueil')</title>
</head>

<body>
    @include('front.navbarAccueil')
    <section class="banner d-flex justify-content-center align-items-center pt-5">
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
    </section>

    <section class="available merriweather py-5">
        <div class="container">
            <div class="row">
                <div class="card mb-3 border-0 rounded-0">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/atelier-cuisine.jpg.webp') }}" class="img-fluid" alt="..." />
                        </div>
                        <div class="col-md-6">
                            <div class="card-body px-0">
                                <h3 id="text-center2" class="card-title">Nos cours de cuisines </h3>
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
                                <h3 id="text-center" class="card-title">Réservez dès maintenant notre salle de cuisine
                                    équipée pour vos
                                    cours culinaires !</h3>
                                <p class="card-text">
                                    Découvrez notre sélection de salles de cours
                                    de cuisine et réservez dès maintenant pour des expériences culinaires inoubliables !
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
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('img/formation-cuisine.jpeg') }}" class="img-fluid" alt="..." />
                </div>
                <div class="col-md-6">
                    <div class="card-body px-0">
                        <h3 id="text-center" class="card-title">Devenez un expert de la restauration : Nos formations
                            professionnelles vous ouvrent les portes du succès culinaire !</h3>
                        <p class="card-text">
                            Préparez-vous à embrasser une carrière passionnante dans le monde de la restauration
                            grâce à nos formations professionnelles
                            sur mesure, conçues pour vous guider vers une reconversion réussie et épanouissante.
                        </p>
                        <p class="card-text"><a href="#" class="btn btn-outline-warning">Formez-vous !</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <section class="cc-menu merriweather py-5">
        <div class="container">
            <div class="row">
                <h3 class="text-center text-light merriweather">Nos variétés</h3>
                <div class="card bg-transparent text-center mb-4">
                    <div class="card-header redressed fs-4">
                        <ul class="nav nav-tabs justify-content-center card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tous Les Menus</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Petit Déjeuné</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Saveurs Italiennes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">L'occident</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body text-light">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <img src="assets/img/Carousel/carousel2.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to additional
                                content. This
                                content is a little bit longer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/Carousel/carousel1.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to additional
                                content. This
                                content is a little bit longer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-sm-none d-md-block">
                    <div class="card">
                        <img src="{{ asset('img/Carousel/carousel3.jpg') }}" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to additional
                                content.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-sm-none d-md-block">
                    <div class="card">
                        <img src="assets/img/Carousel/carousel4.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a longer card with supporting text below as a natural lead-in to additional
                                content. This
                                content is a little bit longer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cc-carousel merriweather bg-dark text-light text-center py-5">
        <div class="container">
            <div class="row">
                <h1 class="text-uppercase">Les délices interdits</h1>
                <div class="col pb-4">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus quae, animi recusandae quidem
                    unde eos ipsam
                    veniam. Aspernatur corrupti necessitatibus ipsum, laboriosam id possimus dignissimos eum vitae
                    repellendus non
                    delectus.
                </div>
            </div>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/Carousel/carousel2.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Le gout de la légèreté</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Carousel/carousel1.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Un décors qui facilite la digestion</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Carousel/carousel3.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Un environnement calme et décontractant</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/Carousel/carousel4.jpg" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>L'hygiène est au rendez-vous</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="order-form py-5">
        <div class="container">
            <h2 class="merriweather text-center text-light mb-4">Passer une commande</h2>
            <form action="" method="">
                <div class="row">
                    <div class="col-md-6 col-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Votre nom complet" />
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01"><i
                                    class="fas fa-utensils"></i></label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option class="text-muted">Choisir un menu</option>
                                <option value="1">Choix 1</option>
                                <option value="2">Choix 2</option>
                                <option value="3">Choix 3</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01"><i
                                    class="fas fa-sort-numeric-up-alt"></i></label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option class="text-muted">Nombre de personnes</option>
                                <option value="1">Moins de 4</option>
                                <option value="2">Entre 4 et 8</option>
                                <option value="3">Entre 8 et 12</option>
                                <option value="3">Plus de 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Votre adresse email" />
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Numéro de téléphone" />
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"
                                placeholder="Adresse zone Ex:. Paris, 12 Rue" />
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Précisez le nombre</span>
                        <input type="text" class="form-control" placeholder="Ex:. 15" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Autres informations</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>

                    </div>
                </div>
                <div class="d-grid gap-2 d-md-block text-center">
                    <button id="mon-bouton" class="btn btn-outline-warning" type="submit">Commandez</button>
                </div>
            </form>
        </div>
    </section>
    @include('front.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>

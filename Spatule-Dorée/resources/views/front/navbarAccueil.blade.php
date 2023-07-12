<nav class="cc-navbar navbar navbar-expand-lg navbar-dark position-fixed w-100">
    <div class="container-fluid">
        <a class="navbar-brand text-uppercase mx-4 py-3 fw-bolder" href="">CookMaster</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item pe-4">
                    <a class="nav-link" aria-current="page" href="/">Accueil</a>
                </li>

                <li class="nav-item pe-4">
                    <a class="nav-link" href="plans">Nos abonnements</a>
                </li>

                <li class="nav-item pe-4">
                    <a class="nav-link" href="/my-events">Nos Événements</a>
                </li>
                @auth
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="{{ route('users.profile.show') }}">Mon profil</a>
                    </li>
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="{{ route('chatify') }}">Chat</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="register">Inscription</a>
                    </li>
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="login">Se connecter</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

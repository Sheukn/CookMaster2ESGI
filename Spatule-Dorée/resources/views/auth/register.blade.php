<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'Inscription')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inscription</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input id="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                                    name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                @foreach ($errors->get('name') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input id="address"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    type="text" name="address" value="{{ old('address') }}" required autofocus
                                    autocomplete="address" />
                                @foreach ($errors->get('address') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="postal_code">Code postal</label>
                                <input id="postal_code"
                                    class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}"
                                    type="text" name="postal_code" value="{{ old('postal_code') }}" required
                                    autofocus autocomplete="postal_code" />
                                @foreach ($errors->get('postal_code') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="city">Ville</label>
                                <input id="city"
                                    class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" type="text"
                                    name="city" value="{{ old('city') }}" required autofocus
                                    autocomplete="city" />
                                @foreach ($errors->get('city') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="country">Pays</label>
                                <input id="country"
                                    class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                    type="text" name="country" value="{{ old('country') }}" required autofocus
                                    autocomplete="country" />
                                @foreach ($errors->get('country') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" />
                                @foreach ($errors->get('email') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" required autocomplete="new-password" />
                                @foreach ($errors->get('password') as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">Confirmation du mot de passe</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="form-group">
                                <div class="row justify-content-end">
                                    <div class="col-md-6">
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            Déjà enregistré?
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Inscription</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

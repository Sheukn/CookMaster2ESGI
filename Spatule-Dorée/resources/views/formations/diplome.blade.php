<!DOCTYPE html>
<html>

<head>
    <h1>CookMaster</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css%22%3E">
</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="" alt="Logo du site" class="mb-4">
            <p class="lead">Vous avez obtenu la certification :</p>

            <h1>{{ $certifications->titre }}</h1>
        </div>

        <div class="mt-5">
            <p class="lead">Délivrée à :</p>
            <h2>{{ $user->name }}</h2>
        </div>
    </div>
</body>

</html>

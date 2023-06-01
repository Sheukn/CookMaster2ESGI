<x-mail::message>
    @component('mail::message')
        # Vérification de l'adresse email

        Bonjour {{ $user->name }},

        Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email :

        @component('mail::button', [
            'url' => route('verification.notice', ['id' => $user->id, 'hash' => $user->verification_token]),
        ])
            Vérifier l'adresse email
        @endcomponent

        Si vous n'avez pas créé de compte, aucune action supplémentaire n'est requise.

        Merci,<br>
        Votre application
    @endcomponent
    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('CookMaster') }}
</x-mail::message>

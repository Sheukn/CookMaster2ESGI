@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Vous allez payer {{ $plan['price_per_month'] }}€ par mois pour la formule
                        {{ $plan['subscription_type'] }}
                    </div>

                    <div class="card-body">

                        <form id="payment-form"
                            action="{{ route('subscription.checkout', ['plan' => $plan['subscription_type']]) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="{{ $plan['subscription_type'] }}">

                            <div class="row">
                                <div class="col-xl-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="card-holder-name">Nom de la carte</label>
                                        <input type="text" name="name" id="card-holder-name" class="form-control"
                                            value="" placeholder="Nom de la carte">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="card-element">Détails de la carte</label>
                                        <div id="card-element"></div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <button type="submit" class="btn btn-primary" id="card-button"
                                        data-secret="{{ $clientSecret }}">Payer</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');
        const cardBtn = document.getElementById('card-button');
        const cardHolderName = document.getElementById('card-holder-name');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            cardBtn.disabled = true;
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            });

            if (error) {
                cardBtn.disabled = false;
            } else {
                let token = document.createElement('input');
                token.setAttribute('type', 'hidden');
                token.setAttribute('name', 'token');
                token.setAttribute('value', setupIntent.payment_method);
                form.appendChild(token);
                form.submit();
            }
        });
    </script>
@endsection

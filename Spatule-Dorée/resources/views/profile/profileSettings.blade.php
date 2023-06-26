@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/profilSettings.css') }}" />

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ $user->firstname }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Prénom</label><input id="firstname" type="text"
                                class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                value="{{ old('firstname') ?? $user->firstname }}" required autocomplete="firstname"
                                autofocus></div>

                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nom</label><input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Mobile</label><input id="phone"
                                        type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') ?? $user->phone }}" required
                                        autocomplete="phone" autofocus>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Adresse</label><input id="address"
                                            type="text" class="form-control @error('address') is-invalid @enderror"
                                            name="address" value="{{ old('address') ?? $user->address }}" required
                                            autocomplete="address" autofocus>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Code Postale</label><input
                                                id="postal_code" type="text"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                name="postal_code" value="{{ old('postal_code') ?? $user->postal_code }}"
                                                required autocomplete="phone" autofocus>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6"><label class="labels">Ville</label><input id="city"
                                                    type="text" class="form-control @error('city') is-invalid @enderror"
                                                    name="city" value="{{ old('city') ?? $user->city }}" required
                                                    autocomplete="city" autofocus>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6"><label class="labels">Pays</label><input
                                                        id="country" type="text"
                                                        class="form-control @error('country') is-invalid @enderror"
                                                        name="country" value="{{ old('country') ?? $user->country }}"
                                                        required autocomplete="country" autofocus>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label class="labels">Email</label><input
                                                            id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('country') ?? $user->email }}"
                                                            required autocomplete="email" autofocus>
                                                    </div>
                                                    <div class="mt-5 text-center"><button
                                                            class="btn btn-primary profile-button" type="button">Save
                                                            Profile</button></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection

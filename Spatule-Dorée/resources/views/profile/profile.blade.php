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
                        <h4 class="text-right">Mon Profil</h4>
                    </div>
                    <div class="row mt-2">
                        <table>
                            <tr>
                                <td class="labels">Prénom</td>
                                <td><input id="firstname" class="form-control" name="firstname"
                                        value="{{ old('firstname') ?? $user->firstname }}" required autocomplete="firstname"
                                        autofocus disabled></td>
                            </tr>
                            <tr>
                                <td>Nom</td>
                                <td><input id="name" class="form-control" name="name"
                                        value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus
                                        disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td><input type="text" class="form-control"
                                        value="{{ old('firstname') ?? $user->phone }}" required autocomplete="phone"
                                        autofocus disabled></td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td><input type="text" class="form-control"
                                        value="{{ old('address') ?? $user->address }} " required autocomplete="address"
                                        autofocus disabled></td>
                            </tr>

                            <tr>
                                <td>Code postal</td>
                                <td><input type="text" class="form-control"
                                        value="{{ old('postal_code') ?? $user->postal_code }} " required
                                        autocomplete="postal_code" autofocus disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td><input type="text" class="form-control" value="{{ old('address') ?? $user->city }} "
                                        required autocomplete="city" autofocus disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Pays</td>
                                <td><input type="text" class="form-control"
                                        value="{{ old('country') ?? $user->country }} " required autocomplete="country"
                                        autofocus disabled></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" value="{{ old('email') ?? $user->email }} "
                                        required autocomplete="email" autofocus disabled>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="mt-5 text-center"><a href="{{ route('users.profile.edit') }}"
                            class="btn btn-primary profile-button" type="button">Modifier mon
                            profil</a></div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

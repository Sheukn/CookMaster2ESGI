@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $formations->formation_titre }}</h1>
                <p>{{ $formations->formation_description }}</p>
                <h2>{{ $formations->chapitre1_titre }}</h2>
                <p>{{ $formations->chapitre1_cours }}</p>
                <h2>{{ $formations->chapitre2_titre }}</h2>
                <p>{{ $formations->chapitre2_cours }}</p>

                <form action="{{ route('formation.submit', ['formation' => $formations->event_id]) }}">
                    <h3>Question 1</h3>
                    <p>{{ $formations->question1 }}</p>
                    <ul>
                        <li class="mt-4">
                            <p>{{ $formations->question1 }}</p>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="question1" value="reponse1q1_correcte">
                                        {{ $formations->reponse1q1 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question1" value="reponse2q1_correcte">
                                        {{ $formations->reponse2q1 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question1" value="reponse3q1_correcte">
                                        {{ $formations->reponse3q1 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question1" value="reponse4q1_correcte">
                                        {{ $formations->reponse4q1 }}
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-4">
                            <p>{{ $formations->question2 }}</p>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="question2" value="reponse1q2_correcte">
                                        {{ $formations->reponse1q2 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question2" value="reponse2q2_correcte">
                                        {{ $formations->reponse2q2 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question2" value="reponse3q2_correcte">
                                        {{ $formations->reponse3q2 }}
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="question2" value="reponse4q2_correcte">
                                        {{ $formations->reponse4q2 }}
                                    </label>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
@endsection

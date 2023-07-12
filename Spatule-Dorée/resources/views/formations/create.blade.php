@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('formation.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <select class="form-select" name="event_id">
                <option value="default">Select formation</option>
                @foreach ($events as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="formation_titre" class="form-label">Titre de la formation :</label>
            <input type="text" name="formation_titre" id="formation_titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="formation_description" class="form-label">Description de la formation :</label>
            <textarea name="formation_description" id="formation_description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="chapitre1_titre" class="form-label">Titre du chapitre 1 :</label>
            <input type="text" name="chapitre1_titre" id="chapitre1_titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="chapitre1_cours" class="form-label">Cours du chapitre 1 :</label>
            <textarea name="chapitre1_cours" id="chapitre1_cours" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="chapitre2_titre" class="form-label">Titre du chapitre 2 :</label>
            <input type="text" name="chapitre2_titre" id="chapitre2_titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="chapitre2_cours" class="form-label">Cours du chapitre 2 :</label>
            <textarea name="chapitre2_cours" id="chapitre2_cours" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="question1" class="form-label">Question 1 :</label>
            <input type="text" name="question1" id="question1" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="reponse1q1" class="form-label">Réponse 1 à la question 1 :</label>
            <input type="text" name="reponse1q1" id="reponse1q1" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse1q1_correcte" id="reponse1q1_correcte" class="form-check-input">
                <label for="reponse1q1_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse2q1" class="form-label">Réponse 2 à la question 1 :</label>
            <input type="text" name="reponse2q1" id="reponse2q1" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse2q1_correcte" id="reponse2q1_correcte" class="form-check-input">
                <label for="reponse2q1_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse3q1" class="form-label">Réponse 3 à la question 1 :</label>
            <input type="text" name="reponse3q1" id="reponse3q1" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse3q1_correcte" id="reponse3q1_correcte" class="form-check-input">
                <label for="reponse3q1_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse4q1" class="form-label">Réponse 4 à la question 1 :</label>
            <input type="text" name="reponse4q1" id="reponse4q1" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse4q1_correcte" id="reponse4q1_correcte" class="form-check-input">
                <label for="reponse4q1_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="question2" class="form-label">Question 2 :</label>
            <input type="text" name="question2" id="question2" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="reponse1q2" class="form-label">Réponse 1 à la question 2 :</label>
            <input type="text" name="reponse1q2" id="reponse1q2" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse1q2_correcte" id="reponse1q2_correcte" class="form-check-input">
                <label for="reponse1q2_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse2q2" class="form-label">Réponse 2 à la question 2 :</label>
            <input type="text" name="reponse2q2" id="reponse2q2" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse2q2_correcte" id="reponse2q2_correcte" class="form-check-input">
                <label for="reponse2q2_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse3q2" class="form-label">Réponse 3 à la question 2 :</label>
            <input type="text" name="reponse3q2" id="reponse3q2" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse3q2_correcte" id="reponse3q2_correcte" class="form-check-input">
                <label for="reponse3q2_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="reponse4q2" class="form-label">Réponse 4 à la question 2 :</label>
            <input type="text" name="reponse4q2" id="reponse4q2" class="form-control" required>
            <div class="form-check">
                <input type="checkbox" name="reponse4q2_correcte" id="reponse4q2_correcte" class="form-check-input">
                <label for="reponse4q2_correcte" class="form-check-label">Correcte</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection

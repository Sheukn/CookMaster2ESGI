<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Certification;

class FormationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($formation)
    {
        $formations = Formation::where('event_id', $formation)->first();


        return view(
            'formations.index',
            [
                'formations' => $formations,

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Events::all();
        return view('formations.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formation = new Formation();
        $formation->title = $request->input('title');
        $formation->event_id = $request->input('event_id');
        $formation->formation_titre = $request->input('formation_titre');
        $formation->formation_description = $request->input('formation_description');
        $formation->chapitre1_titre = $request->input('chapitre1_titre');
        $formation->chapitre1_cours = $request->input('chapitre1_cours');
        $formation->chapitre2_titre = $request->input('chapitre2_titre');
        $formation->chapitre2_cours = $request->input('chapitre2_cours');
        $formation->question1 = $request->input('question1');
        $formation->reponse1q1 = $request->input('reponse1q1');
        $formation->reponse1q1_correcte = $request->input('reponse1q1_correcte') ? true : false;
        $formation->reponse2q1 = $request->input('reponse2q1');
        $formation->reponse2q1_correcte = $request->input('reponse2q1_correcte') ? true : false;
        $formation->reponse3q1 = $request->input('reponse3q1');
        $formation->reponse3q1_correcte = $request->input('reponse3q1_correcte') ? true : false;
        $formation->reponse4q1 = $request->input('reponse4q1');
        $formation->reponse4q1_correcte = $request->input('reponse4q1_correcte') ? true : false;
        $formation->question2 = $request->input('question2');
        $formation->reponse1q2 = $request->input('reponse1q2');
        $formation->reponse1q2_correcte = $request->input('reponse1q2_correcte') ? true : false;
        $formation->reponse2q2 = $request->input('reponse2q2');
        $formation->reponse2q2_correcte = $request->input('reponse2q2_correcte') ? true : false;
        $formation->reponse3q2 = $request->input('reponse3q2');
        $formation->reponse3q2_correcte = $request->input('reponse3q2_correcte') ? true : false;
        $formation->reponse4q2 = $request->input('reponse4q2');
        $formation->reponse4q2_correcte = $request->input('reponse4q2_correcte') ? true : false;

        // Enregistrement de la formation dans la base de données
        $formation->save();

        // Redirection ou autre logique de votre choix

    }


    /**
     * Display the specified resource.
     */
    public function submit(Request $request, $formation)
    {
        $user = auth()->user();
        $formation = Formation::where('event_id', $formation)->first();
        $score = 0;
        $question1Answer = $request->input('question1');
        $question2Answer = $request->input('question2');
        if ($formation->$question1Answer == 1) {
            $score++;
        }
        if ($formation->$question2Answer == 1) {
            $score++;
        }

        if ($score == 2) {

            $certification = new Certification();
            $certification->user_id = $user->id;
            $certification->event_id = $formation->event_id;
            $certification->titre = $formation->formation_titre;
            $certification->save();
            return redirect()->route('welcome', $formation)->with('success', 'Bravo, vous avez réussi le test !');
        } else {
            return redirect()->route('welcome', $formation)->with('error', 'Dommage, vous avez échoué le test !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

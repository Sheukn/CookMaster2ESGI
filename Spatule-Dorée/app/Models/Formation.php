<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_id',
        'formation_titre',
        'formation_description',
        'chapitre1_titre',
        'chapitre1_cours',
        'chapitre2_titre',
        'chapitre2_cours',
        'question1',
        'reponse1q1',
        'reponse1q1_correcte',
        'reponse2q1',
        'reponse2q1_correcte',
        'reponse3q1',
        'reponse3q1_correcte',
        'reponse4q1',
        'reponse4q1_correcte',
        'question2',
        'reponse1q2',
        'reponse1q2_correcte',
        'reponse2q2',
        'reponse2q2_correcte',
        'reponse3q2',
        'reponse3q2_correcte',
        'reponse4q2',
        'reponse4q2_correcte',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    // public function certification()
    // {
    //     return $this->hasOne(Certification::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

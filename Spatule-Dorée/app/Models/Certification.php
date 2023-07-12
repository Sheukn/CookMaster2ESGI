<?php

namespace App\Models;

use App\Models\User;
use App\Models\Events;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'titre',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    // public function formation()
    // {
    //     return $this->belongsTo(Formation::class);
    // }
}

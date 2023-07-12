<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepHasUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_step',
        'user_id',
        'step_id',
    ];
    protected $table = 'step_has_user';
}

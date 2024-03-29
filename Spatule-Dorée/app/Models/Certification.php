<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'image',
        'level',
        'validity_time',
    ];

    protected $table = 'certification';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationHasUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_obteined',
        'is_available',
        'certification_id',
        'user_id',

    ];
    protected $table = 'certification_has_user';
}

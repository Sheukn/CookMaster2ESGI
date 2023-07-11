<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */

    protected $fillable = [
        'category',
        'name',
        'description',
        'prep_time',
        'cooking_time',
        'number_of_persons',
        'type',
        'gastronomy',
        'difficulty',
        'is_bookmarked',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array

     */
    
}
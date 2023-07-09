<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipements extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'category',
        'description',
        'price',
        'available_quantity',
        'image'
    ];

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Events::class);
    }
}

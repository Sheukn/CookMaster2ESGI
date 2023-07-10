<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'office_id',
        'capacity',
        'description',
        'price',
        'is_booked',
        'image'

    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Events::class);
    }
}

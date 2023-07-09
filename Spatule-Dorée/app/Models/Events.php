<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_event',
        'end_event',
        'description',
        'is_physics',
        'id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_has_user', 'event_id', 'user_id');
    }

    public function equipements(): BelongsToMany
    {
        return $this->belongsToMany(Equipements::class);
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Rooms::class);
    }
}

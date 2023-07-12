<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'image_path',
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

    // public function certification(): HasOne
    // {
    //     return $this->hasOne(Certification::class);
    // }

    // public function steps(): BelongsToMany
    // {
    //     return $this->belongsToMany(Events::class, 'step_has_user', 'step_id', 'user_id');
    // }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}

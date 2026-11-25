<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = [
    'slug', 'title', 'album_type', 'release_date',
    'cover_url', 'description',
];

protected $casts = ['release_date' => 'date'];

public function tracks(): HasMany
{
    return $this->hasMany(Track::class)->orderBy('track_number');
}

public function videos(): HasMany
{
    return $this->hasMany(MusicVideo::class, 'album_id');
}
}

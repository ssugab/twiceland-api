<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
    'album_id', 'title', 'duration', 'track_number',
        'is_title_track', 'composers', 'producers',
    ];

    protected $casts = [
        'is_title_track' => 'boolean',
        'composers'      => 'array',
        'producers'      => 'array',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicVideo extends Model
{
    protected $fillable = [
    'slug', 'title', 'album_id', 'release_date',
        'youtube_id', 'thumbnail_url', 'category',
    ];

    protected $casts = ['release_date' => 'date'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}

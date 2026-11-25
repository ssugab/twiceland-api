<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    'member_id', 'album_id', 'image_url',
        'category', 'members_in_photo', 'taken_date',
    ];

    protected $casts = [
        'members_in_photo' => 'array',
        'taken_date'       => 'date',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}

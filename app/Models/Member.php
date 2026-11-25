<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
    'slug', 'stage_name', 'real_name', 'korean_name',
    'birth_date', 'nationality', 'positions', 'sub_unit',
    'image_url', 'bio', 'sort_order',
];

protected $casts = [
    'positions'  => 'array',
    'birth_date' => 'date',
];

public function galleries(): HasMany
{
    return $this->hasMany(Gallery::class);
}
}

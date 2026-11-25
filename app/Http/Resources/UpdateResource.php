<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UpdateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $p = $this->published_at;

        return [
            'id'        => $this->id,
            'slug'      => $this->slug,
            'title'     => $this->title,
            'excerpt'   => $this->excerpt,
            'content'   => $this->content,
            'category'  => $this->category,
            'image_url' => $this->image_url,
            'published_at' => $p?->toIso8601String(),
            // Format lama (kompatibel newsData.js):
            'year'    => $p?->format('Y'),
            'month'   => $p?->format('F'),
            'day'     => $p?->format('d'),
            'weekday' => $p?->format('l'),
            'date'    => $p?->toDateString(),
            'author'  => $this->whenLoaded('author', fn () => $this->author->username),
        ];
    }
}
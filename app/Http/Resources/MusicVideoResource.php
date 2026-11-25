<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MusicVideoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'slug'          => $this->slug,
            'title'         => $this->title,
            'album_id'      => $this->album_id,
            'release_date'  => $this->release_date?->toDateString(),
            'youtube_id'    => $this->youtube_id,
            // Rekonstruksi URL di Resource (prinsip: jangan simpan yang derivable)
            'youtube_url'   => $this->youtube_id
                ? "https://www.youtube.com/watch?v={$this->youtube_id}"
                : null,
            'embed_url'     => $this->youtube_id
                ? "https://www.youtube.com/embed/{$this->youtube_id}"
                : null,
            'thumbnail_url' => $this->thumbnail_url,
            'category'      => $this->category,
        ];
    }
}
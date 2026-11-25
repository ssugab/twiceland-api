<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'slug'         => $this->slug,
            'title'        => $this->title,
            'album_type'   => $this->album_type,
            'release_date' => $this->release_date?->toDateString(),
            'cover_url'    => $this->cover_url,
            'description'  => $this->description,
            // whenLoaded: hanya muncul kalau di controller pakai ->with('tracks')
            'tracks'       => TrackResource::collection($this->whenLoaded('tracks')),
        ];
    }
}
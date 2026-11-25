<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'title'          => $this->title,
            'duration'       => $this->duration,
            'track_number'   => $this->track_number,
            'is_title_track' => (bool) $this->is_title_track,
            'composers'      => $this->composers ?? [],
            'producers'      => $this->producers ?? [],
        ];
    }
}
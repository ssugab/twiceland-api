<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'member_id'        => $this->member_id,
            'album_id'         => $this->album_id,
            'image_url'        => $this->image_url,
            'category'         => $this->category,
            'members_in_photo' => $this->members_in_photo ?? [],
            'taken_date'       => $this->taken_date?->toDateString(),
        ];
    }
}
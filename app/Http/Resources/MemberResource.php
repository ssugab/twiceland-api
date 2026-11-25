<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'slug'        => $this->slug,
            'name'        => $this->name,
            'korean_name' => $this->korean_name,
            'birth_date'  => $this->birth_date?->toDateString(),
            'nationality' => $this->nationality,
            'positions'   => $this->positions ?? [],
            'sub_unit'    => $this->sub_unit,
            'image_url'   => $this->image_url,
            'bio'         => $this->bio,
            'sort_order'  => $this->sort_order,
        ];
    }
}

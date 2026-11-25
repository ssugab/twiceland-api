<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GalleryResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $images = Gallery::query()
            ->when($request->category, fn ($q) =>
                $q->where('category', $request->category)
            )
            ->when($request->member_id, fn ($q) =>
                $q->where('member_id', $request->member_id)
            )
            ->latest()
            ->paginate(24);

        return GalleryResource::collection($images);
    }
}
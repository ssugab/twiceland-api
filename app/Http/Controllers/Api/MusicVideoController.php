<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MusicVideoResource;
use App\Models\MusicVideo;
use Illuminate\Http\Request;

class MusicVideoController extends Controller
{
    public function index(Request $request)
    {
        $videos = MusicVideo::query()
            ->when($request->category, fn ($q) =>
                $q->where('category', $request->category)
            )
            ->when($request->album_id, fn ($q) =>
                $q->where('album_id', $request->album_id)
            )
            ->orderByDesc('release_date')
            ->get();

        return MusicVideoResource::collection($videos);
    }
}
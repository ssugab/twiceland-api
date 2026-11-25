<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $albums = Album::query()
            ->when($request->album_type, fn ($q) =>
                $q->where('album_type', $request->album_type)
            )
            ->orderByDesc('release_date')
            ->get();

        // LIST: tanpa tracks (respons ringan)
        return AlbumResource::collection($albums);
    }

    public function show(string $slug)
    {
        // DETAIL: with tracks (eager loading, sekaligus order by track_number di relasi)
        $album = Album::with('tracks')->where('slug', $slug)->firstOrFail();

        return new AlbumResource($album);
    }
}
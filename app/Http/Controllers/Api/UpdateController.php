<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UpdateResource;
use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index(Request $request)
    {
        $updates = Update::with('author')
            ->when($request->category, fn ($q) =>
                $q->where('category', $request->category)
            )
            ->orderByDesc('published_at')
            ->paginate(10);

        return UpdateResource::collection($updates);
    }

    public function show(string $slug)
    {
        $update = Update::with('author')
            ->where('slug', $slug)
            ->firstOrFail();

        return new UpdateResource($update);
    }
}
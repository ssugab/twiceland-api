<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::query()
            ->when($request->sub_unit, fn ($q) =>
                $q->where('sub_unit', $request->sub_unit)
            )
            ->orderBy('sort_order')
            ->get();

        return MemberResource::collection($members);
    }

    public function show(string $slug)
    {
        $member = Member::where('slug', $slug)->firstOrFail();

        return new MemberResource($member);
    }
}
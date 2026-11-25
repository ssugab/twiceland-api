<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UpdateController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\MusicVideoController;
use App\Http\Controllers\Api\GalleryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    // Members
    Route::get('/members',         [MemberController::class, 'index']);
    Route::get('/members/{slug}',  [MemberController::class, 'show']);

    // Albums
    Route::get('/albums',          [AlbumController::class, 'index']);
    Route::get('/albums/{slug}',   [AlbumController::class, 'show']);

    // Music Videos
    Route::get('/videos',          [MusicVideoController::class, 'index']);

    // Gallery
    Route::get('/gallery',         [GalleryController::class, 'index']);

    // Updates (news)
    Route::get('/updates',         [UpdateController::class, 'index']);
    Route::get('/updates/{slug}',  [UpdateController::class, 'show']);
});
<?php

namespace Tests\Feature\Api;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlbumApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_list_of_albums_without_tracks()
    {
        Album::factory()->count(2)->create();

        $response = $this->getJson('/api/v1/albums');

        $response->assertOk()
                 ->assertJsonCount(2, 'data')
                 // Karena index() tidak with('tracks'), field 'tracks' tidak ada
                 ->assertJsonMissingPath('data.0.tracks');
    }

    /** @test */
    public function it_returns_album_with_tracks_when_requested()
    {
        $album = Album::factory()->create(['slug' => 'ready-to-be']);
        $album->tracks()->createMany([
            ['title' => 'Set Me Free', 'duration' => '3:01',
             'track_number' => 1, 'is_title_track' => true,
             'composers' => ['A'], 'producers' => ['B']],
            ['title' => 'Moonlight Sunrise', 'duration' => '3:00',
             'track_number' => 2, 'is_title_track' => false,
             'composers' => ['C'], 'producers' => ['D']],
        ]);

        $response = $this->getJson('/api/v1/albums/ready-to-be');

        $response->assertOk()
                 ->assertJsonPath('data.slug', 'ready-to-be')
                 ->assertJsonCount(2, 'data.tracks')
                 ->assertJsonPath('data.tracks.0.title', 'Set Me Free')
                 ->assertJsonPath('data.tracks.0.is_title_track', true);
    }
}
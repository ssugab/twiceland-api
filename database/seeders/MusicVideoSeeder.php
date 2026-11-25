<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\MusicVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rtb = Album::where('slug', 'ready-to-be')->first();

        MusicVideo::create([
            'slug'          => 'set-me-free-mv',
            'title'         => 'TWICE "SET ME FREE" M/V',
            'album_id'      => $rtb?->id,
            'release_date'  => '2023-03-10',
            'youtube_id'    => 'https://youtu.be/w4cTYnOPdNk',
            'thumbnail_url' => '/images/RTB.jpg',
            'category'      => 'Official MV',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $albums = [
            ['slug'=>'the-story-begins','title'=>'The Story Begins','album_type'=>'Mini Album',  'release_date'=>'2015-10-20','cover_url'=>'/images/thestory.jpg',           'description'=>'Debut mini album'],
            ['slug'=>'between-1-and-2', 'title'=>'Between 1&2',    'album_type'=>'Mini Album',  'release_date'=>'2022-08-26','cover_url'=>'/images/twice-betweenjpg.jpg',   'description'=>'11th mini album'],
            ['slug'=>'ready-to-be',     'title'=>'Ready To Be',    'album_type'=>'Mini Album',  'release_date'=>'2023-03-10','cover_url'=>'/images/RTB.jpg',                'description'=>'12th mini album'],
            ['slug'=>'this-is-for',     'title'=>'This Is For',    'album_type'=>'Full Album',  'release_date'=>'2025-07-11','cover_url'=>'/images/thisisfor.jpg',          'description'=>'4th studio album'],
        ];

        foreach ($albums as $a) {
            Album::create($a);
        }
    }
}

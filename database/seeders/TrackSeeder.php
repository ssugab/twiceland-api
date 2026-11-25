<?php

namespace Database\Seeders;

use App\Models\Track;
use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'ready-to-be' => [
                ['title'=>'Set Me Free',       'duration'=>'3:01','track_number'=>1,'is_title_track'=>true, 'composers'=>['Melanie Fontana'],'producers'=>['Lindgren']],
                ['title'=>'Moonlight Sunrise', 'duration'=>'3:00','track_number'=>2,'is_title_track'=>false,'composers'=>['earattack'],      'producers'=>['earattack']],
                ['title'=>'Got the Thrills',   'duration'=>'3:05','track_number'=>3,'is_title_track'=>false,'composers'=>['Danke'],          'producers'=>['Sim Eun-jee']],
                ['title'=>'Blame It On Me',    'duration'=>'3:03','track_number'=>4,'is_title_track'=>false,'composers'=>['Lee Seu-ran'],    'producers'=>['Sim Eun-jee']],
                ['title'=>'Wallflower',        'duration'=>'3:03','track_number'=>5,'is_title_track'=>false,'composers'=>['JQ'],             'producers'=>['JQ']],
                ['title'=>'Crazy Stupid Love', 'duration'=>'2:50','track_number'=>6,'is_title_track'=>false,'composers'=>['danke'],          'producers'=>['danke']],
                ['title'=>'Set Me Free (Eng)', 'duration'=>'3:01','track_number'=>7,'is_title_track'=>false,'composers'=>['Melanie Fontana'],'producers'=>['Lindgren']],
            ],
            'the-story-begins' => [
                ['title'=>'Like OOH-AHH','duration'=>'3:35','track_number'=>1,'is_title_track'=>true, 'composers'=>['Black Eyed Pilseung'],'producers'=>['Black Eyed Pilseung']],
                ['title'=>'Do It Again', 'duration'=>'3:22','track_number'=>2,'is_title_track'=>false,'composers'=>['J.Y. Park'],           'producers'=>['J.Y. Park']],
                ['title'=>'Going Crazy','duration'=>'3:15','track_number'=>3,'is_title_track'=>false,'composers'=>['J.Y. Park'],           'producers'=>['J.Y. Park']],
            ],
        ];

        foreach ($data as $albumSlug => $tracks) {
            $album = Album::where('slug', $albumSlug)->first();
            if ($album) $album->tracks()->createMany($tracks);
        }
    }
}

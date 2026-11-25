<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = Member::all();

        foreach ($members as $m) {
            Gallery::create([
                'member_id'        => $m->id,
                'image_url'        => $m->image_url,
                'category'         => 'Concept Photo',
                'members_in_photo' => [$m->slug],
                'taken_date'       => '2023-03-01',
            ]);
        }

        // tambahan: 1 foto grup
        Gallery::create([
            'member_id'        => null,
            'image_url'        => '/images/twice.png',
            'category'         => 'Event',
            'members_in_photo' => Member::pluck('slug')->toArray(),
            'taken_date'       => '2023-04-01',
        ]);
    }


}

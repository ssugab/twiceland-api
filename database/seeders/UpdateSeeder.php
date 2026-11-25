<?php

namespace Database\Seeders;

use App\Models\Update;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class UpdateSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        $updates = [
            ['title'=>'TWICE Umumkan Comeback "Ready To Be"','excerpt'=>'Mini album ke-12 dengan title track "Set Me Free".','category'=>'comeback','published_at'=>now()->subDays(2),'image_url'=>'/images/RTB.jpg'],
            ['title'=>'TWICE World Tour III Siap Digelar',   'excerpt'=>'Tur dunia ke 15 kota di Asia, Eropa, Amerika.','category'=>'tour','published_at'=>now()->subDays(5),'image_url'=>'/images/220425-TWICE-4TH-WORLD-TOUR-III-IN-JAPAN-Press-Photos-documents-7.jpeg'],
            ['title'=>'TWICE Menang Daesang MAMA 2023',      'excerpt'=>'Penghargaan bergengsi akhir tahun.','category'=>'award','published_at'=>now()->subDays(10),'image_url'=>'/images/hero.jpg'],
        ];

        foreach ($updates as $u) {
            Update::create([
                ...$u,
                'slug'    => Str::slug($u['title']) . '-' . Str::random(4),
                'user_id' => $admin?->id,
                'content' => $u['excerpt'] . ' Selengkapnya...',
            ]);
        }
    }
}
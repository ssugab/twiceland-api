<?php
namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name'=>'Nayeon',   'korean_name'=>'나연', 'birth_date'=>'1995-09-22','nationality'=>'South Korea','positions'=>['Lead Vocalist','Center'],       'image_url'=>'/images/Members/Nayeon-TEN.jpg'],
            ['name'=>'Jeongyeon','korean_name'=>'정연', 'birth_date'=>'1996-11-01','nationality'=>'South Korea','positions'=>['Lead Vocalist'],                'image_url'=>'/images/Members/JY-TEN.jpg'],
            ['name'=>'Momo',     'korean_name'=>'모모', 'birth_date'=>'1996-11-09','nationality'=>'Japan',      'positions'=>['Main Dancer','Sub Vocalist'],   'image_url'=>'/images/Members/Momo-TEN.jpg'],
            ['name'=>'Sana',     'korean_name'=>'사나','birth_date'=>'1996-12-29','nationality'=>'Japan',      'positions'=>['Sub Vocalist'],                  'image_url'=>'/images/Members/Sana-TEN.jpg'],
            ['name'=>'Jihyo',    'korean_name'=>'지효', 'birth_date'=>'1997-02-01','nationality'=>'South Korea','positions'=>['Leader','Main Vocalist'],       'image_url'=>'/images/Members/Jihyo-TEN.jpg'],
            ['name'=>'Mina',     'korean_name'=>'미나', 'birth_date'=>'1997-03-24','nationality'=>'Japan',      'positions'=>['Main Dancer','Sub Vocalist'],   'image_url'=>'/images/Members/Mina-TEN.jpg'],
            ['name'=>'Dahyun',   'korean_name'=>'다현', 'birth_date'=>'1998-05-28','nationality'=>'South Korea','positions'=>['Lead Rapper'],                   'image_url'=>'/images/Members/Dahyun-TEN.jpg'],
            ['name'=>'Chaeyoung','korean_name'=>'채영', 'birth_date'=>'1999-04-23','nationality'=>'South Korea','positions'=>['Main Rapper','Sub Vocalist'],   'image_url'=>'/images/Members/Chaeyoung-TEN.jpg'],
            ['name'=>'Tzuyu',    'korean_name'=>'쯔위', 'birth_date'=>'1999-06-14','nationality'=>'Taiwan',     'positions'=>['Lead Dancer','Sub Vocalist','Maknae'],'image_url'=>'/images/Members/Tzuyu-TEN.jpg'],
        ];

        foreach ($members as $i => $m) {
            Member::create([
                ...$m,
                'slug'       => Str::slug($m['name']),
                'sort_order' => $i,
            ]);
        }
    }
}
<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        $stageName = $this->faker->unique()->firstName();

        return [
            'slug'        => Str::slug($stageName) . '-' . $this->faker->randomNumber(3),
            'stage_name'  => $stageName,
            'real_name'   => $this->faker->name(),
            'korean_name' => $this->faker->name(),
            'birth_date'  => $this->faker->date(),
            'nationality' => $this->faker->randomElement(['South Korea', 'Japan', 'Taiwan']),
            'positions'   => $this->faker->randomElements(
                ['Vocalist', 'Dancer', 'Rapper', 'Leader', 'Maknae'], 2
            ),
            'sub_unit'    => null,
            'image_url'   => '/images/placeholder.jpg',
            'bio'         => $this->faker->paragraph(),
            'sort_order'  => $this->faker->numberBetween(0, 20),
        ];
    }
}

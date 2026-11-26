<?php

namespace Database\Factories;

use App\Models\Update;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Update>
 */
class UpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'slug'         => Str::slug($title) . '-' . $this->faker->randomNumber(4),
            'title'        => $title,
            'excerpt'      => $this->faker->paragraph(),
            'content'      => $this->faker->paragraphs(3, true),
            'category'     => $this->faker->randomElement(['comeback', 'tour', 'award']),
            'published_at' => $this->faker->dateTimeBetween('-1 year'),
            'image_url'    => '/images/placeholder.jpg',
            'user_id'      => null,
        ];
    }
}

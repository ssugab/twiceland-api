<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(3, true);
        return [
            'slug'         => Str::slug($title),
            'title'        => ucwords($title),
            'album_type'   => $this->faker->randomElement(['Mini Album', 'Full Album', 'Single']),
            'release_date' => $this->faker->date(),
            'cover_url'    => '/images/placeholder.jpg',
            'description'  => $this->faker->sentence(),
        ];
    }
}

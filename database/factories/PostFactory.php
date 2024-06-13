<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category_id' => $this->faker->numberBetween(1, 25),
            'meta_tag' => fake()->words(3,true),
            'meta_keyword' => fake()->words(5,true),
            'path' => $this->faker->imageUrl(640, 480, 'business', true),
            'status' => $this->faker->boolean(80),
            'description' => $this->faker->paragraph,
            'user_id' => fake()->numberBetween(1,10),


        ];
    }
}

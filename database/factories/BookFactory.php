<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $fileName = $this->faker->numberBetween(1,14) . '.jpg';
 
        return [
            'title' => fake()->words(3, true),
            'author' => fake()->name(),
            'description' =>$this->faker->sentence(),
            'publisher' => fake()->words(3,true),
            'category_id'  => fake()->numberBetween(1,10),
            'pageCount'  => fake()->numberBetween(100,2000),
            'coverImage' => "images/{$fileName}",
            'quantity' => 1,
            'checkout' => fake()->boolean(),
        ];
    }
}

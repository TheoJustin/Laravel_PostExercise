<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
    public function definition()
    {

        $categories = ['educational', 'fiction', 'nonfiction'];

        return [
            'url'=> $this->faker->imageUrl(),
            'title' => $this->faker->sentence(1),
            'description' => $this->faker->sentence(10),
            'price'=> rand(30000, 80000),
            'category' => $this->faker->randomElement($categories),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
    }
}

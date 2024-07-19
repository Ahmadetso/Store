<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

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
        $images = ['gis1.jpg','gis2.jpg','gis3.jpg'];
        return [
            "title" => fake()->title,
            "body" => fake()->text(150),
            'image' => 'image/cover/' . fake()->randomElement($images),


            "category_id" => Category::factory(),
            "publisher_id" => Publisher::factory(),
            "number_of_copies" => fake()->numberBetween(80,120),
            "number_of_pages" => fake()->numberBetween(90,130),
            "price" => fake()->randomNumber(2),


        ];
    }
}

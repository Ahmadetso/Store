<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Faker\Factory as Faker;

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
    

        $images = ['1.png', '2.png', '3.png','4.png','6.png','5.png'];
        return [
            "title" => fake()->name(),
            "body" => fake()->text(150),
            'image' => 'image/cover/' . fake()->randomElement($images),
            'publish_year' => fake()->year(),
            'isbn' => fake()->numberBetween(10000000000, 9999999999),

            "category_id" => Category::factory(),
            "publisher_id" => Publisher::factory(),
            "number_of_copies" => fake()->numberBetween(80, 120),
            "number_of_pages" => fake()->numberBetween(90, 130),
            "price" => fake()->randomNumber(2),


        ];
    }
}

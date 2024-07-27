<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $images = ['gis1.jpg','gis2.jpg','gis3.jpg'];

        //  Publisher::factory(1)->create();
        Author::factory(2)->create();
        // Category::factory(3)->create();
        Book::factory(60)->create();
        foreach (Author::all() as $auth) {
            $faker = Faker::create();
            $books = Book::inRandomOrder()->take(rand(1,7))->pluck('id');
            $auth->books()->attach($books);
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

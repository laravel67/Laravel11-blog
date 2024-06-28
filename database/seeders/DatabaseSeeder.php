<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure unique category names
        $categories = collect([
            'Web Design',
            'Web Developer',
            'UI UX',
            'Data Analyst',
            'Cyber Security',
            'Computer Sciences'
        ]);

        $colors = collect([
            'green',
            'blue',
            'yellow',
            'red',
            'orange',
            'pink'
        ]);

        $categories->each(function ($category) use ($colors) {
            Category::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category, '-'),
                'color' => $colors->shift(), // Mengambil warna secara berurutan dari koleksi warna
            ]);
        });

        // Create 10 users
        User::factory(10)->create();
        Post::factory(100)->create();

        // Create 100 posts with random user and category
        // Post::factory(100)->create([
        //     'author_id' => $faker->numberBetween(1, 10),
        //     'category_id' => $faker->numberBetween(1, 6),
        // ]);
    }
}

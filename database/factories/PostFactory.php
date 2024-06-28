<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $body = collect($this->faker->paragraphs(mt_rand(5, 10)))
            ->map(fn ($p) => "<p>$p</p>")
            ->implode("\n");

        return [
            'title' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->sentence()),
            'body' => $body,
            'author_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}

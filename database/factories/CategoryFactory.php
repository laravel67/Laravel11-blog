<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Web Design' => 'green',
            'Web Developer' => 'blue',
            'UI UX' => 'yellow',
            'Data Analyst' => 'red',
            'Cyber Security' => 'orange',
            'Computer Sciences' => 'pink'
        ];

        $name = $this->faker->unique()->randomElement(array_keys($categories));

        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'color' => $categories[$name]
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        
        return [
            "title" => $title,
            "slug" =>Str::slug($title),
            "description" =>  $this->faker->paragraph(3),
            "price" =>  $this->faker->numberBetween($min=100,$max=900),
            "old_price" =>  $this->faker->numberBetween($min=900,$max=1200),
            "inStock" =>  $this->faker->numberBetween($min=100,$max=900),
            "qty" =>  $this->faker->numberBetween($min=100,$max=900),
            "category_id" => Category::inRandomOrder()->first(),
        ];
    }
}


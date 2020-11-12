<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $categoryName = $this->faker->sentence(3);
        return [
            'name'  => $categoryName,
            'slug'  => Str::slug($categoryName)
        ];
    }
}

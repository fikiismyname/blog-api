<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $postTitle = $this->faker->sentence;
        return [
            'title' => $postTitle,
            'slug' => Str::slug($postTitle),
            'featured_image_url' => $this->faker->imageUrl,
            'description' => $this->faker->text,
            'body' => $this->faker->paragraph(3),
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        User::factory()->times(5)->hasPosts(5);
        Post::factory()
            ->times(12)
            ->hasCategory(5)
            ->hasTags(3)
            ->create();
    }
}

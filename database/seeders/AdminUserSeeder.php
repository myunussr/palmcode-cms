<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create or update admin user
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('Admin123!'),
            ]
        );

        // Create or update categories
        $categories = collect([
            'Technology',
            'Education',
            'Lifestyle',
        ])->map(function ($name) {
            return Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        });

        // Create or update 5 posts
        foreach (range(1, 5) as $i) {
            $title = "Sample Post #$i";

            Post::updateOrCreate(
                ['title' => $title],
                [
                    'slug'         => Str::slug($title),
                    'excerpt'      => "Excerpt for sample post #$i.",
                    'content'      => "This is the full content for sample post #$i.",
                    'status'       => 'published',
                    'published_at' => Carbon::now()->subDays($i),
                ]
            );
        }
    }
}

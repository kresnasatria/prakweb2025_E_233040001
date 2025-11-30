<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 5 user dengan nama Indonesia
        $users = [
            ['name' => 'Kresna Satria', 'username' => 'kresnasatria', 'email' => 'kresnasatria160@example.com'],
            ['name' => 'Tyezar Hasan', 'username' => 'tyezarhasan', 'email' => 'tyezarhasan@example.com'],
            ['name' => 'Sachrul Akbar', 'username' => 'sachrulakbar', 'email' => 'sachrulakbar@example.com'],
            ['name' => 'Aqillah Lean', 'username' => 'aqillahlean', 'email' => 'aqillahlean@example.com'],
            ['name' => 'Moreno Wisesa', 'username' => 'morenowisesa', 'email' => 'morenowisesa@example.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);
        }

        // Membuat 2 kategori
        $teknologi = Category::create(['name' => 'Teknologi']);
        $editing   = Category::create(['name' => 'Editing']);

        // Membuat 10 posts dengan konten Indonesia
            $posts = [
                ['title' => 'Perkembangan AI yang Merajalela', 'category' => $teknologi->id, 'author' => 1],
                ['title' => 'Teknik Dasar Editing After Effects', 'category' => $editing->id, 'author' => 2],
                ['title' => 'Revolusi Teknologi 5G', 'category' => $teknologi->id, 'author' => 3],
                ['title' => 'Cara Membuat Speedramp di After Effects', 'category' => $editing->id, 'author' => 4],
                ['title' => 'Keamanan Siber di Era Digital', 'category' => $teknologi->id, 'author' => 5],
                ['title' => 'Color Grading untuk Video Sinematik', 'category' => $editing->id, 'author' => 1],
                ['title' => 'Cloud Computing untuk Bisnis Modern', 'category' => $teknologi->id, 'author' => 2],
                ['title' => 'Tips Membuat Thumbnail YouTube yang Menarik', 'category' => $editing->id, 'author' => 3],
                ['title' => 'Internet of Things dan Masa Depan Rumah Pintar', 'category' => $teknologi->id, 'author' => 4],
                ['title' => 'Cara Mengedit Video Short agar Lebih Viral', 'category' => $editing->id, 'author' => 5],
            ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => \Illuminate\Support\Str::slug($post['title']),
                'user_id' => $post['author'],
                'category_id' => $post['category'],
                'excerpt' => 'Ringkasan artikel tentang ' . $post['title'],
                'body' => 'Konten lengkap artikel tentang ' . $post['title'] . '. Artikel ini memberikan informasi penting dan bermanfaat.',
            ]);
        }
    }
}
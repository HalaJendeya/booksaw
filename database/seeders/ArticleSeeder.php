<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::create([
            'title' => 'Reading books always makes the moments happy',
            'slug' => 'reading-books-always-makes-the-moments-happy',
            'image' => 'post-img1.jpg',
            'category' => 'Inspiration',
            'published_at' => '2021-03-30',
            'excerpt' => 'Reading books always makes the moments happy and meaningful.',
            'content' => 'Reading books always makes the moments happy. This article talks about how reading improves imagination, focus, and emotional well-being.',
            'is_featured' => true,
        ]);

        Article::create([
            'title' => 'Why reading daily changes your mindset',
            'slug' => 'why-reading-daily-changes-your-mindset',
            'image' => 'post-img2.jpg',
            'category' => 'Inspiration',
            'published_at' => '2021-03-29',
            'excerpt' => 'Daily reading builds discipline and expands your way of thinking.',
            'content' => 'Daily reading helps build stronger habits, deeper knowledge, and better concentration over time.',
            'is_featured' => true,
        ]);

        Article::create([
            'title' => 'How books help you grow and learn faster',
            'slug' => 'how-books-help-you-grow-and-learn-faster',
            'image' => 'post-img3.jpg',
            'category' => 'Inspiration',
            'published_at' => '2021-02-27',
            'excerpt' => 'Books are one of the best tools for learning and personal growth.',
            'content' => 'Books help people grow by offering new ideas, experiences, and lessons that can be applied in real life.',
            'is_featured' => true,
        ]);
    }
}

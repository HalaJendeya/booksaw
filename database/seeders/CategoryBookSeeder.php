<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryBookSeeder extends Seeder
{
    public function run(): void
    {
        $business = Category::create([
            'name' => 'Business',
            'slug' => 'business',
            'description' => 'Business books',
        ]);

        $technology = Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => 'Technology books',
        ]);

        $romantic = Category::create([
            'name' => 'Romantic',
            'slug' => 'romantic',
            'description' => 'Romantic books',
        ]);

        $adventure = Category::create([
            'name' => 'Adventure',
            'slug' => 'adventure',
            'description' => 'Adventure books',
        ]);

        $fictional = Category::create([
    'name' => 'Fictional',
    'slug' => 'fictional',
    'description' => 'Fictional books',
]);

        Book::create([
            'category_id' => $business->id,
            'title' => 'Simple Way of Piece Life',
            'slug' => 'simple-way-of-piece-life',
            'author' => 'Armor Ramsey',
            'description' => 'A sample business book description.',
            'price' => 40.00,
            'image' => 'product-item1.jpg',
            'stock' => 10,
            'is_featured' => true,
            'is_best_seller' => false,
            'is_on_offer' => false,
        ]);

        Book::create([
            'category_id' => $technology->id,
            'title' => 'Great Travel at Desert',
            'slug' => 'great-travel-at-desert',
            'author' => 'Sanchit Howdy',
            'description' => 'A sample technology book description.',
            'price' => 38.00,
            'image' => 'product-item2.jpg',
            'stock' => 15,
            'is_featured' => true,
            'is_best_seller' => false,
            'is_on_offer' => true,
        ]);

        Book::create([
            'category_id' => $romantic->id,
            'title' => 'The Lady Beauty Scarlett',
            'slug' => 'the-lady-beauty-scarlett',
            'author' => 'Arthur Doyle',
            'description' => 'A sample romantic book description.',
            'price' => 45.00,
            'image' => 'product-item3.jpg',
            'stock' => 8,
            'is_featured' => true,
            'is_best_seller' => true,
            'is_on_offer' => false,
        ]);

        Book::create([
            'category_id' => $adventure->id,
            'title' => 'Once Upon a Time',
            'slug' => 'once-upon-a-time',
            'author' => 'Klien Marry',
            'description' => 'A sample adventure book description.',
            'price' => 35.00,
            'image' => 'product-item4.jpg',
            'stock' => 12,
            'is_featured' => true,
            'is_best_seller' => true,
            'is_on_offer' => true,
        ]);

        Book::create([
            'category_id' => $business->id,
            'title' => 'Business Growth Strategy',
            'slug' => 'business-growth-strategy',
            'author' => 'Michael Stone',
            'description' => 'A business strategy book.',
            'price' => 42.00,
            'image' => 'tab-item2.jpg',
            'stock' => 9,
            'is_featured' => false,
            'is_best_seller' => true,
            'is_on_offer' => false,
        ]);

        Book::create([
            'category_id' => $technology->id,
            'title' => 'Modern Technology Guide',
            'slug' => 'modern-technology-guide',
            'author' => 'Sarah Johnson',
            'description' => 'A technology guide book.',
            'price' => 39.00,
            'image' => 'tab-item3.jpg',
            'stock' => 11,
            'is_featured' => false,
            'is_best_seller' => true,
            'is_on_offer' => false,
        ]);

        Book::create([
            'category_id' => $romantic->id,
            'title' => 'Love in the Moonlight',
            'slug' => 'love-in-the-moonlight',
            'author' => 'Emily Rose',
            'description' => 'A romantic novel.',
            'price' => 36.00,
            'image' => 'tab-item5.jpg',
            'stock' => 7,
            'is_featured' => false,
            'is_best_seller' => true,
            'is_on_offer' => true,
        ]);

        Book::create([
            'category_id' => $adventure->id,
            'title' => 'Journey Beyond the Sea',
            'slug' => 'journey-beyond-the-sea',
            'author' => 'Daniel Blue',
            'description' => 'An adventure story.',
            'price' => 41.00,
            'image' => 'tab-item7.jpg',
            'stock' => 13,
            'is_featured' => false,
            'is_best_seller' => true,
            'is_on_offer' => false,
        ]);

        Book::create([
            'category_id' => $business->id,
            'title' => 'Startup Success',
            'slug' => 'startup-success',
            'author' => 'Olivia Hart',
            'description' => 'A book about startups and success.',
            'price' => 44.00,
            'image' => 'tab-item8.jpg',
            'stock' => 10,
            'is_featured' => false,
            'is_best_seller' => false,
            'is_on_offer' => true,
        ]);

        Book::create([
    'category_id' => $fictional->id,
    'title' => 'Dreams of Tomorrow',
    'slug' => 'dreams-of-tomorrow',
    'author' => 'Lina Carter',
    'description' => 'A fictional story about hope and imagination.',
    'price' => 37.00,
    'image' => 'tab-item6.jpg',
    'stock' => 9,
    'is_featured' => false,
    'is_best_seller' => true,
    'is_on_offer' => false,
]);

Book::create([
    'category_id' => $fictional->id,
    'title' => 'The Hidden World',
    'slug' => 'the-hidden-world',
    'author' => 'James Orion',
    'description' => 'A fictional adventure in a mysterious world.',
    'price' => 43.00,
    'image' => 'tab-item8.jpg',
    'stock' => 14,
    'is_featured' => false,
    'is_best_seller' => true,
    'is_on_offer' => true,
]);
    }
}

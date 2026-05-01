<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quote::create([
            'quote' => 'A room without books is like a body without a soul.',
            'author' => 'Cicero',
        ]);

        Quote::create([
            'quote' => 'So many books, so little time.',
            'author' => 'Frank Zappa',
        ]);

        Quote::create([
            'quote' => 'There is no friend as loyal as a book.',
            'author' => 'Ernest Hemingway',
        ]);

        Quote::create([
            'quote' => 'Books are a uniquely portable magic.',
            'author' => 'Stephen King',
        ]);

        Quote::create([
            'quote' => 'Reading is essential for those who seek to rise above the ordinary.',
            'author' => 'Jim Rohn',
        ]);
    }
}

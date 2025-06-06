<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Jane Austen',
                'address' => 'Steventon, Hampshire, England',
                'phone' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mark Twain',
                'address' => 'Florida, Missouri, USA',
                'phone' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charles Dickens',
                'address' => 'Portsmouth, England',
                'phone' => '555-123-4567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
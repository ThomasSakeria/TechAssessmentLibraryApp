<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $categories = [
        'fun', 'serious', 'fiction', 'non-fiction', 'history', 'politics', 'humor' , 'tragic'
       ];
       foreach ($categories as $category)
        {
              Category::create([
                'title' => $category,
                'description' =>fake()->sentence(),
              ]); 
        }

    }
}

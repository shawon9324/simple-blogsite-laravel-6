<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        factory(Category::class, 5)->create();
        factory(Blog::class, 20)->create();
    }
}
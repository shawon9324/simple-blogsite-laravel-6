<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'blog_title' => ucfirst($faker->text(50)),
        'category_id' => Category::all()->random(),
        'slug' => Str::slug($faker->text(10)),
        'blog_description' => $faker->text(100),
        'image'         =>  str_replace("storage/uploads/blog\\", "", ltrim(strstr($faker->image('public/uploads/blog',  640, 480, null, true), "/"),  "/"))
    ];

    /**
     *  $table->string('blog_title');
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->text('blog_description');
            $table->string('image')->nullable();
            $table->timestamps();
     *
     */
});
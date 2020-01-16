<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => ucfirst($faker->text(50)),
        'category_id' => Category::all()->random(),
        'price' => $faker->numberBetween(1000, 9000),
        'product_name' => $faker->text(100),
        'status' => $faker->randomElement([0, 1]),
        'description' => $faker->text(100)
    ];
});
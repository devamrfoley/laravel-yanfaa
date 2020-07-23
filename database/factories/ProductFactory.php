<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }, 
        'price' => $faker->randomFloat(2, 0, 10000),
        'stock' => $faker->randomDigit,
        'image' => 'product.png',
    ];
});
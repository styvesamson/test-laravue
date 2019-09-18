<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Product::class, function (Faker $faker) {

    $product = $faker->unique()->sentence;
    $file = UploadedFile::fake()->image('product.png', 600, 600);

    return [
        'sku' => $this->faker->numberBetween(1111111, 999999),
        'name' => $product,
        'slug' => str_slug($product),
        'description' => $this->faker->paragraph,
        'cover' => $file->store('products', ['disk' => 'public']),
        'price' => 5.00,
        'status' => 1,
        'weight' => 5,
        'mass_unit' => 'kg',
        'category_id' => 1
    ];
});

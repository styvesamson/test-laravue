<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;


$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->unique()->randomElement([
        'Gear',
        'Clothing',
        'Shoes',
        'Diapering',
        'Feeding',
        'Bath',
        'Toys',
        'Nursery',
        'Household',
        'Grocery'
    ]);

    $file = UploadedFile::fake()->image('category.png', 600, 600);

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'cover' => $file->store('categories', ['disk' => 'public']),
        'status' => 1
    ];
});

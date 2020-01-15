<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'decriptions' => $faker->realText(100),
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});

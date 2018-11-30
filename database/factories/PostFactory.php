<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\User;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = $faker->realText(100);
    $slug = Str::slug($title);
    return [
        'slug' => $slug,
        'title' => $title,
        'excerpt' => $faker->paragraph,
        'body' => $faker->realText(1000),
        'published' => true,
        'publish_date' => now(),
        'author_id' => User::inRandomOrder()->first()->id,
    ];
});

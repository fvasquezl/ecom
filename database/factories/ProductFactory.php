<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text($maxNbChars = 30),
        'code' => $faker->word,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomFloat(null, 0, 2),
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
    ];
});

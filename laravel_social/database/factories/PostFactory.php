<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker -> sentence($nbWords = 4, $variableNbWords = true),
        'content' => $faker -> paragraph($nbSentences = 6, $variableNbSentences = true)
    ];
});

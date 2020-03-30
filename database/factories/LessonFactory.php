<?php

$factory->define(App\Lesson::class, function (Faker\Generator $faker) {
    return [
        "course_id" => factory('App\Course')->create(),
        "title" => $faker->name,
        "description" => $faker->name,
        "position" => $faker->randomNumber(2),
    ];
});

<?php

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        "course_name" => $faker->name,
        "course_code" => $faker->name,
        "department" => $faker->name,
        "description" => $faker->name,
    ];
});

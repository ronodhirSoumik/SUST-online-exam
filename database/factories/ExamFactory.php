<?php

$factory->define(App\Exam::class, function (Faker\Generator $faker) {
    return [
        "course_id" => factory('App\Course')->create(),
        "lesson_id" => factory('App\Lesson')->create(),
        "title" => $faker->name,
        "start_time" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "duration" => $faker->randomNumber(2),
        "description" => $faker->name,
    ];
});

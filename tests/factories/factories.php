<?php

$factory('Gist\User', [
//    'id' => $faker->uuid,
    'name' => $faker->sentence,
    'username' => $faker->unique()->userName,
    'email' => $faker->unique()->email,
    'password' => $faker->words,
]);

// And a custom one for anonymous user
$factory('Gist\User', 'anonymous', [
//    'id' => $faker->uuid,
    'username' => 'anonymous',
    'name' => $faker->sentence,
    'password' => $faker->words,
    'email' => $faker->unique()->email,
]);

$factory('Gist\Gist', [
    'id' => $faker->uuid,
    'title' => $faker->sentence,
    'content' => $faker->paragraph,
    'public' => $faker->boolean,
    'user_id' => 'factory:Gist\User',
]);
<?php

$factory('Gist\User', [
    'name' => $faker->sentence,
    'username' => $faker->unique()->userName,
    'email' => $faker->unique()->email,
    'password' => $faker->words,
]);

// And a custom one for anonymous user
$factory('Gist\User', 'anonymous', [
    'username' => 'anonymous',
    'name' => $faker->sentence,
    'password' => $faker->words,
    'email' => $faker->unique()->email,
]);

$factory('Gist\Gist', [
    'title' => $faker->sentence,
    'content' => $faker->paragraph,
    'public' => $faker->boolean,
    'user_id' => 'factory:Gist\User',
]);
<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Address::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zip' => $faker->postcode
    ];
});

$factory->define(App\Seller::class, function(Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'address_id' => function() {
            return factory(App\Address::class)->create()->id;
        }
    ];
});

$factory->define(App\Product::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 30, $indexSize = 2),
        'price' => $faker->numberBetween(200, 1500),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'seller_id' => function() {
            return factory(App\Seller::class)->create()->id;
        }
    ];
});

$factory->define(App\Review::class, function(Faker\Generator $faker) {
    return [
        'critic_name' => $faker->name,
        'title' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'review_date' => $faker->dateTime($max = 'now'),
        'product_id' => function() {
            return factory(App\Product::class)->create()->id;
        }
    ];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

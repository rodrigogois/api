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
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Client::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
    return [
        'consultant_id' => function () {
             return factory(App\Entities\Consultant::class)->create()->id;
        },
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->word,
        'observation' => $faker->text,
        'photo' => $faker->text,
    ];
});

$factory->define(App\Entities\Consultant::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));
	return [
        'user_id' => function () {
             return factory(App\Entities\User::class)->create()->id;
        },
        'phone' => $faker->phoneNumber,
        'address' => $faker->word,
        'photo' => $faker->text,
    ];
});

$factory->define(App\Entities\Product::class, function (Faker\Generator $faker) {
    $name = $faker->realText(10);
	return [
		'name' => $name,
		'code_product'  => $faker->word,
		'value' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9),
		'quantity' => $faker->randomDigitNotNull
    ];
});




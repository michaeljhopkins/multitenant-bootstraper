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

$factory->define(Multistarter\Models\Client::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->company
	];
});

$factory->define(Multistarter\Models\Order::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'tenant_id' => $faker->randomNumber(8),
		'user_id' => $faker->randomNumber(8)
	];
});

$factory->define(Multistarter\Models\Permission::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'tenant_id' => $faker->randomNumber(8),
		'name' => $faker->name,
		'slug' => $faker->slug
	];
});

$factory->define(Multistarter\Models\Product::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'tenant_id' => $faker->randomNumber(8),
		'name' => $faker->name,
		'recurring' => $faker->randomNumber(8)
	];
});

$factory->define(Multistarter\Models\Role::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'tenant_id' => $faker->randomNumber(8),
		'name' => $faker->name,
		'slug' => $faker->slug
	];
});

$factory->define(Multistarter\Models\Tenant::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'name' => $faker->url,
		'url' => $faker->url
	];
});

$factory->define(Multistarter\Models\User::class, function (Faker\Generator $faker) {
	return [
		'client_id' => $faker->randomNumber(8),
		'tenant_id' => $faker->randomNumber(8),
		'email' => $faker->email,
		'password' => bcrypt(str_random(10))
	];
});
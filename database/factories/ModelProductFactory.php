<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'name'		=>	$faker->name,
        'details'	=>	$faker->paragraph,
        'discount'	=>	$faker->numberBetween(2,30),
        'price'		=>	$faker->numberBetween(100,1000),
        'stock'		=>	$faker->randomDigit
    ];	
});

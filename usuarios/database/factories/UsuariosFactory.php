<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
 
  /*  para crear los datos  de prueba*/
$factory->define(App\Usuarios::class, function (Faker $faker) {
    return [
        'nombres' => $faker->Name,
        'apellidos' => $faker->lastName,
        'cedula' => $faker->unique()->numberBetween(1012066211,512066211589),
        'correo' => $faker->unique()->safeEmail,
        'telefono' =>$faker->numberBetween(3223585041,4005565041),
        
    ];
});

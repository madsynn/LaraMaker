<?php


$faker = Faker\Factory::create();

for ($i = 0; $i < 100; $i++)
{
  $user = User::create([
    'username' => $faker->userName,
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'email' => $faker->email,
    'password' => $faker->word
  ]);
}

 ?>

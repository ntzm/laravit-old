<?php

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->truncate();

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 50; $i++) {
      User::create(array(
        'name'       => $faker->userName,
        'password'   => Hash::make($faker->userName),
        'created_at' => $faker->unixTime($max = 'now')
      ));

    }
  }
}

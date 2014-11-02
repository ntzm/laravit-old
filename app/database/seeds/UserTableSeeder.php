<?php

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->truncate();

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 50; $i++) {
      User::create(array(
        'name'       => substr(strtr($faker->userName, '.', ''), 0, 20),
        'password'   => Hash::make($faker->userName),
        'created_at' => $faker->unixTime($max = 'now')
      ));

    }
  }
}

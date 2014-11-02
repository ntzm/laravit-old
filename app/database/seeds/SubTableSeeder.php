<?php

class SubTableSeeder extends Seeder {

  public function run()
  {
    DB::table('subs')->truncate();

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 10; $i++) {
      Sub::create(array(
        'name'       => substr(str_replace('.', '', $faker->userName), 0, 20),
        'owner_id'   => $faker->numberBetween($min = 1, $max = 50),
        'created_at' => $faker->unixTime($max = 'now')
      ));
    }
  }
}

<?php

class PostTableSeeder extends Seeder {

  public function run()
  {
    DB::table('posts')->truncate();

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 200; $i++) {
      Post::create(array(
        'title'      => $faker->text($maxNbChars = 50),
        'url'        => $faker->url,
        'created_at' => $faker->unixTime($max = 'now'),
        'sub_id'     => $faker->numberBetween($min = 1, $max = 10),
        'user_id'    => $faker->numberBetween($min = 1, $max = 50)
      ));
    }
  }
}

<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker\Factory::create();

        // For testing purposes
        User::create([
            'name'     => 'admin',
            'password' => Hash::make('admin')
        ]);

        for ($i = 0; $i < 49; $i++)
        {
            User::create([
                'name'       => substr(str_replace('.', '', $faker->userName), 0, 20),
                'password'   => Hash::make($faker->userName),
                'created_at' => $faker->unixTime($max = 'now')
            ]);

        }
    }
}

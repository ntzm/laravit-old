<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $tableNames = ['User', 'Post', 'Sub'];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tableNames as $tableName)
        {
            $this->call($tableName . 'TableSeeder');
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

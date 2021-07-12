<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            ParamSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            UserRoleSeeder::class,
            TtdSeeder::class,
            UserSeeder::class
        ]);
    }
}

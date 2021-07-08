<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'id' => 1,
            'role' => 'Super Admin'
        ]);
        
        DB::table('user_roles')->insert([
            'id' => 200,
            'role' => 'user'
        ]);
    }
}

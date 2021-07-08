<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'nik' => '9988112277336644',
            'gender' => 'laki-laki',
            'date_of_birth' => now(),
            'address' => 'admin',
            'province_id' => 11,
            'city_id' => 1101,
            'phone_number' => '081210294688',
            'photo' => 'user_photo/admin.jpg',
            'user_role_id' => 1,
            'password' => Hash::make('081210294688'),
        ]);
    }
}

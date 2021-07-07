<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('params')->insert([
            'id' => 1,
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'Kewirausahaan',
            'order' => 1,
        ]);

        DB::table('params')->insert([
            'id' => 2,
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'Koperasi',
            'order' => 2,
        ]);

        DB::table('params')->insert([
            'id' => 3, 
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'UMKM',
            'order' => 3,
        ]);

        DB::table('params')->insert([
            'id' => 4, 
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'Magang',
            'order' => 4,
        ]);

        DB::table('params')->insert([
            'id' => 5, 
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'Standarisasi dan Sertifikasi',
            'order' => 5,
        ]);

        DB::table('params')->insert([
            'id' => 6,
            'parent_id' => NULL,
            'category' => 'unit',
            'param' => 'Inkubasi Usaha',
            'order' => 6,
        ]);

        DB::table('params')->insert([
            'id' => 7,
            'parent_id' => 1,
            'category' => 'sub_unit',
            'param' => 'Pemasyarakatan Kewirausahaan',
            'order' => 1,
        ]);
        
        DB::table('params')->insert([
            'id' => 8,
            'parent_id' => 1,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Technopreneur',
            'order' => 2,
        ]);

        DB::table('params')->insert([
            'id' => 9,
            'parent_id' => 1,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Kewirausahaan',
            'order' => 3,
        ]);

        DB::table('params')->insert([
            'id' => 10,
            'parent_id' => 1,
            'category' => 'sub_unit',
            'param' => 'Kewirausahaan Sosial',
            'order' => 4,
        ]);

        DB::table('params')->insert([
            'id' => 11,
            'parent_id' => 2,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Perkoperasian Bagi Pengurus dan Manajer Koperasi',
            'order' => 5,
        ]);

        DB::table('params')->insert([
            'id' => 12,
            'parent_id' => 2,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Perkoperasian Syariah Bagi Pengurus dan Manajer Koperasi',
            'order' => 6,
        ]);

        DB::table('params')->insert([
            'id' => 13,
            'parent_id' => 3,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Vocational',
            'order' => 7,
        ]);

        DB::table('params')->insert([
            'id' => 14,
            'parent_id' => 3,
            'category' => 'sub_unit',
            'param' => 'Pelatihan E-Commerce',
            'order' => 8,
        ]);

        DB::table('params')->insert([
            'id' => 15,
            'parent_id' => 5,
            'category' => 'sub_unit',
            'param' => 'Pengembangan SKKNI',
            'order' => 9,
        ]);

        DB::table('params')->insert([
            'id' => 16,
            'parent_id' => 5,
            'category' => 'sub_unit',
            'param' => 'Pelatihan & Uji Kompetensi SKKNI',
            'order' => 10,
        ]);

        DB::table('params')->insert([
            'id' => 17,
            'parent_id' => 5,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Pengelola LKM Berbasis Kompetensi',
            'order' => 11,
        ]);

        DB::table('params')->insert([
            'id' => 18,
            'parent_id' => 5,
            'category' => 'sub_unit',
            'param' => 'Pelatihan Manajemen Berbasis Kompetensi',
            'order' => 12,
        ]);

        DB::table('params')->insert([
            'id' => 19,
            'parent_id' => 6,
            'category' => 'sub_unit',
            'param' => 'Fasilitasi Layanan Inkubasi Usaha Mikro',
            'order' => 13,
        ]);

        DB::table('params')->insert([
            'id' => 20,
            'parent_id' => 4,
            'category' => 'sub_unit',
            'param' => 'Fasilitasi Magang',
            'order' => 14,
        ]);

        DB::table('params')->insert([
            'id' => 21,
            'parent_id' => NULL,
            'category' => 'role',
            'param' => 'Peserta',
            'order' => 1,
        ]);

        DB::table('params')->insert([
            'id' => 22,
            'parent_id' => NULL,
            'category' => 'role',
            'param' => 'Moderator',
            'order' => 2,
        ]);

        DB::table('params')->insert([
            'id' => 23,
            'parent_id' => NULL,
            'category' => 'role',
            'param' => 'Narasumber',
            'order' => 3,
        ]);
    }
}

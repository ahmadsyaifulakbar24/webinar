<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TtdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ttds')->insert([
            'id' => 1,
            'name' => 'Ahmad Zabadi, SH, MM',
            'unit' => 'Deputi Bidang Perkoperasian',
            'ttd_path' => 'assets/images/ttd/ahmad_zabadi.png',
        ]);

        DB::table('ttds')->insert([
            'id' => 2,
            'name' => 'Ir. Arif Rahman Hakim, M.S',
            'unit' => 'Sekretaris Kementerian',
            'ttd_path' => 'assets/images/ttd/arif_rahman.png',
        ]);

        DB::table('ttds')->insert([
            'id' => 3,
            'name' => 'Budi Mustopo',
            'unit' => 'Kepala Biro Komunikasi dan Teknologi Informasi',
            'ttd_path' => 'assets/images/ttd/arif_rahman.png',
        ]);
    }
}

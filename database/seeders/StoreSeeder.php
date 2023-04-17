<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('stores')->insert([

            [
                'nama_toko' => 'Store Es Batu',
                'deskripsi_toko' => 'Toko ini murah sekali guys',
                'alamat_toko' => 'Kaliand, Samping Toko A',
                'whatsapp' => '0812312321321',

            ],
            [
                'nama_toko' => 'Toko Ayam Murah',
                'deskripsi_toko' => 'Toko ini murah sekali ygy',
                'alamat_toko' => 'Kaliand, Samping Toko B',
                'whatsapp' => '0814213123211',

            ],

        ]
        );
    }
}

<?php

namespace App\Database\Seeds;

use App\Models\PembayaranModel;
use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        (new PembayaranModel())->insert([
            'id'              => 2,
            'tgl'             => '2022-10-03',
            'tagihan'         => '650000',
            'dibayar'         => 'Rp.650.000',
            'nama_pembayar'   => 'reyhan',
            'metodebayar_id'  => 1,
            'pengguna_id'     => 1,
        ]);
        
    }
}

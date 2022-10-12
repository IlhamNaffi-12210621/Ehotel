<?php

namespace App\Database\Seeds;

use App\Models\PembayaranModel;
use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        (new PembayaranModel())->insert([
            'tgl'             => '01-10-2022',
            'tagihan'         => 'Rp.650.000',
            'dibayar'         => 'Rp.650.000',
            'nama_pembayar'   => 'reyhan',
            'metodebayar_id'  => 1,
            'pengguna_id'     => 1,
        ]);
        
    }
}

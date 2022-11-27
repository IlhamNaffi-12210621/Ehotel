<?php

namespace App\Database\Seeds;

use App\Models\PembayaranModel;
use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $id = (new PembayaranModel())->insert([
            'tgl' => '2022-11-02',
            'tagihan' => '650000',
            'dibayar' => '650000',
            'nama_pembayar' => 'Ilham',
            'metodebayar_id' => '1',
            'pengguna_id' => '1',
        ]);
        echo "hasil id = $id";
    }
}

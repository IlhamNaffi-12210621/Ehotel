<?php

namespace App\Database\Seeds;

use App\Models\KamarDipesanModel;
use CodeIgniter\Database\Seeder;

class KamardipesanSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new KamarDipesanModel())->insert([
            'pemesanan_id'  => 0,
            'kamar_id'      => 1,
            'tarif'         => 'Normal',
            'pengguna_id'   => 1,
        ]);
        echo "hasil insert $r";
    }
}

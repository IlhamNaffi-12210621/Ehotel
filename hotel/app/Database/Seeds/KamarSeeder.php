<?php

namespace App\Database\Seeds;

use App\Models\KamarModel;
use CodeIgniter\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run()
    {
        $id = (new KamarModel())->insert([
            'kamartipe_id' => '1',
            'lantai' => '',
            'nomor' => '',
            'kamarstatus_id' => '1',
            'deskripsi' => '',
        ]);
        echo "hasil id = $id";
    }
}

<?php

namespace App\Database\Seeds;

use App\Models\KamarModel;
use CodeIgniter\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run()
    {
        $id = (new KamarModel())->insert([
            'kamartipe_id'  => '7',
            'lantai'        => '3',
            'nomor'         => '9',
            'kamarstatus_id'=> '7',
            'deskripsi'     => 'ditempati',
        ]);
    }
}

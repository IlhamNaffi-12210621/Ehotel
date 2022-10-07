<?php

namespace App\Database\Seeds;

use App\Models\KamarstatusModel;
use CodeIgniter\Database\Seeder;

class KamarstatusSeeder extends Seeder
{
    public function run()
    {
        $id = (new KamarstatusModel())->insert([
            'id'        => 'reyhan',
            'status'    => 'ditempati',
            'keterangan'=> '2 hari',
        ]);
    }
}

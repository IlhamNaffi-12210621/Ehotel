<?php

namespace App\Database\Seeds;

use App\Models\PemesananstatusModel;
use CodeIgniter\Database\Seeder;

class PemesananstatusSeeder extends Seeder
{
    public function run()
    {
        $id = (new PemesananstatusModel())->insert([
            'status'    =>'ditempati',
            'urutan'    =>'7',
            'aktif'     =>'Y',
        ]);
    }
}

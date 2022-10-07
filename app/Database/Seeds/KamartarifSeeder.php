<?php

namespace App\Database\Seeds;

use App\Models\KamartarifModel;
use CodeIgniter\Database\Seeder;

class KamartarifSeeder extends Seeder
{
    public function run()
    {
        $id = (new KamartarifModel())->insert([
            'kamartipe_id'      => '303',
            'tarif'             => 'Rp.650.000',
            'tgl_mulai'         => '01-10-2022',
            'tgl_selesai'       => '03-10-2022',
            'tipetarif_id'      => 'Nasional',
        ]);
        echo "hasil id = $id";
    }
}

<?php

namespace App\Database\Seeds;

use App\Models\TipetarifModel;
use CodeIgniter\Database\Seeder;

class TipetarifSeeder extends Seeder
{
    public function run()
    {
        (new TipetarifModel())->insertBatch([
            ['tipe'    =>'Normal'], 
            ['tipe'    =>'Akhir Pekan'], 
            ['tipe'    =>'Nasional'], 
        ]);
    }
}

<?php

namespace App\Database\Seeds;

use App\Models\KamartipeModel;
use CodeIgniter\Database\Seeder;

class KamartipeSeeder extends Seeder
{
    public function run()
    {
        (new KamartipeModel())->insertBatch([
            ['Tipe'     => 'Deluxe'],
            ['Tipe'     => 'Superior'],
            ['Tipe'     => 'Suite'],
            ['Tipe'     => 'Master Suite'],
        ]);
    }
}

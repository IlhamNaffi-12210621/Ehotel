<?php

namespace App\Database\Seeds;

use App\Models\NegaraModel;
use CodeIgniter\Database\Seeder;

class NegaraSeeder extends Seeder
{
    public function run()
    {
        (new NegaraModel())->insertBatch([
            ['Negara'       => 'Indonesian'],
            ['Negara'       => 'Malaysian'],
            ['Negara'       => 'Japan'],
            ['Negara'       => 'Singapore'],
        ]);
    }
}

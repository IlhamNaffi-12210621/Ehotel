<?php

namespace App\Database\Seeds;

use App\Models\MetodebayarModel;
use CodeIgniter\Database\Seeder;

class MetodebayarSeeder extends Seeder
{
    public function run()
    {
        (new MetodebayarModel())->insertBatch([
            ['metode'    =>'Tunai'],
            ['metode'    =>'Transfer'],
            ['metode'    =>'Debit'],
            ['metode'    =>'Credit'],
        ]);
    }
}

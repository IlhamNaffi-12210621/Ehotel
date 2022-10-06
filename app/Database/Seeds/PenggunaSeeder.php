<?php

namespace App\Database\Seeds;

use App\Models\PenggunaModel;
use CodeIgniter\Database\Seeder;
use PDO;
use PhpParser\Node\Stmt\Echo_;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $id = (new PenggunaModel())->insert([
            'nama'  => 'Administrator',
            'gender'    => 'L',
            'email' => 'naffiilham@gmail.com',
            'sandi' => password_hash('123456', PASSWORD_BCRYPT),
        ]);
        echo "hasil id = $id";
    }
}

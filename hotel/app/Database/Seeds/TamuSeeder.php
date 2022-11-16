<?php

namespace App\Database\Seeds;

use App\Models\TamuModel;
use CodeIgniter\Database\Seeder;

class TamuSeeder extends Seeder
{
    public function run()
    {
        $id = (new TamuModel())->insert([
            'nama_depan' => 'ilham',
            'nama_belakang' => 'naffi',
            'gender' => 'L',
            'alamat' => 'jl.kanaja',
            'kota' => 'London',
            'negara_id' => '1',
            'nohp' => '087264567813',
            'email' => 'user@gmail.com',
            'sandi' => password_hash('user', PASSWORD_BCRYPT),
        ]);
        echo "hasil id = $id";
    }
}

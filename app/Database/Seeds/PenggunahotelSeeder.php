<?php

namespace App\Database\Seeds;

use App\Database\Migrations\Penggunahotel;
use App\Models\PenggunahotelModel;
use CodeIgniter\Database\Seeder;

class PenggunahotelSeeder extends Seeder
{
    public function run()
    {
        $id = (new PenggunahotelModel())->insert([
            'nama_depan'    => 'Administrator',
            'nama_belakang' => 'Administrator',
            'gender'        => 'L',
            'alamat'        => 'Pontianak',
            'kota'          => 'Pontianak',
            'tgl_lhr'       => '2003-08-11',
            'notelp'        => '085845530771',
            'nohp'          => '082255332087',
            'email'         => 'naffiilham@gmail.com',
            'sandi'         => password_hash('123456', PASSWORD_BCRYPT),
        ]);
        echo "hasil id = $id";
    }
}

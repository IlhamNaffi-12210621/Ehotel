<?php

namespace App\Database\Seeds;

use App\Models\TamuModel;
use CodeIgniter\Database\Seeder;

class TamuSeeder extends Seeder
{
    public function run()
    {
        $id =(new TamuModel())->insert([
            'nama_depan'    => 'reyhan',
            'nama_belakang' => 'baik',
            'gender'        => 'L',
            'alamat'        => 'Pontianak',
            'kota'          => 'Pontianak',
            'negara_id'     => 1,
            'nohp'          => '085391825034',
            'email'         => 'reyhanbaik@gmail.com',
            'sandi'         => password_hash('123456', PASSWORD_BCRYPT),

        ]);
        echo "hasil id = $id";  
        
      
    }
}

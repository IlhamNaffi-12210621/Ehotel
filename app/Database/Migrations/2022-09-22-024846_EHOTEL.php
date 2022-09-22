<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EHOTEL extends Migration
{
    public function up()
    {
        $this->forge->addfield([
            'id'            => ['type' => 'int', 'auto_increment' => true],
            'nama_depan'    => [ 'type' => 'varchar', 'contraint' => 50, 'null' => false],
            'nama_belakang' => [ 'type' => 'varchar', 'constrain' => 50, 'null' => true],
            'tgl_lahir'     => [ 'type' => 'datetime', 'null' => true],
            'gender'        => [ 'type' => 'enum("L", "P")', 'default' => 'L'],
            'password'      => [ 'type' => 'varchar', 'constraint' => 32]
        ]);
        $this->forge->addkey('id');
        $this->forge->createtable('Ehotel');
    }

    public function down()
    {
        $this->forge->droptable('Ehotel');
    }
}

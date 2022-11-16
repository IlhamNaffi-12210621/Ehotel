<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KamarDipesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'auto_increment'=>true ,  'null'=>false],
            'pemesanan_id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'kamar_id'  => [ 'type'=>'int','constraint'=>10, 'unsigned'=>true, 'null'=>true ],
            'tarif'  => [ 'type'=>'double', 'unsigned'=>true, 'null'=>true ],
            'pengguna_id'  => [ 'type'=>'int','constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'created_at'  => [ 'type'=>'datetime', 'null'=>true ],
            'updated_at'  => [ 'type'=>'datetime', 'null'=>true ],
        ]); 
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pemesanan_id','pemesanan','id','cascade');
        $this->forge->addForeignKey('kamar_id','kamar','id','cascade');
        $this->forge->addForeignKey('pengguna_id','pengguna','id','cascade');
        $this->forge->createTable('kamardipesan');

    }

    public function down()
    {
        $this->forge->dropTable('kamardipesan');
    }
}

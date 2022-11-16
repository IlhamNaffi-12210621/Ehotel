<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    { 
        $this->forge->addField([
            'id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'tgl'  => [ 'type'=>'date','null'=>true ],
            'tagihan'  => [ 'type'=>'double','null'=>true ],
            'dibayar'  => [ 'type'=>'double','null'=>true ],
            'nama_pembayar'  => [ 'type'=>'varchar','constraint'=>50, 'null'=>true ],
            'metodebayar_id'  => [ 'type'=>'int','constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'pengguna_id'  => [ 'type'=>'int','constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'created_at'  => [ 'type'=>'datetime', 'null'=>true ],
            'updated_at'  => [ 'type'=>'datetime', 'null'=>true ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('metodebayar_id','metodebayar','id','cascade' );
        $this->forge->addForeignKey('pengguna_id','pengguna','id','cascade' );
        $this->forge->createTable('pembayaran');
  
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}

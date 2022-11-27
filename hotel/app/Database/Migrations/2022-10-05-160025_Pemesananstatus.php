<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemesananstatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'null'=>true ],
            'status'  => [ 'type'=>'varchar', 'constraint'=>50,'null'=>true ],
            'urutan'  => [ 'type'=>'int', 'constraint'=>11,'unsigned'=>true, 'null'=>true ],
            'aktif'  => [ 'type'=>'enum("Y","T")', 'null'=>false ],
        ]); 
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pemesananstatus'); 
    }

    public function down()
    {
        $this->forge->dropTable('pemesananstatus');
    }
}

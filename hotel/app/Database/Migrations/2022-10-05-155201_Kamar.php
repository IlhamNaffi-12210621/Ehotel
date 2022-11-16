<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'auto_increment'=>true , 'null'=>false ],
            'kamartipe_id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'lantai'  => [ 'type'=>'varchar', 'constraint'=>5,'null'=>false ],
            'nomor'  => [ 'type'=>'varchar', 'constraint'=>10, 'null'=>false ],
            'kamarstatus_id'  => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'null'=>false ],
            'deskripsi'  => [ 'type'=>'text', 'null'=>true ],
        ]); 
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kamartipe_id','kamartipe','id','cascade');
        $this->forge->addForeignKey('kamarstatus_id','kamarstatus','id','cascade');
        $this->forge->createTable('kamar');

    }

    public function down()
    {
        $this->forge->dropTable('kamar');
    }
}

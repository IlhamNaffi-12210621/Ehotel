<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamartarif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            =>['type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'auto_increment'=>true],
            'kamartipe_id'  =>['type'=>'int', 'constraint'=>10, 'null'=>true, 'unsigned'=>true],
            'tarif'         =>['type'=>'double', 'null'=>true],
            'tgl_mulai'     =>['type'=>'date', 'null'=>true],
            'tgl_selesai'   =>['type'=>'date', 'null'=>true],
            'tipetarif_id'  =>['type'=>'int', 'constraint'=>10, 'null'=>true, 'unsigned'=>true],
            'create_at'     =>['type'=>'datetime', 'null'=>true],
            'updated_at'    =>['type'=>'datetime', 'null'=>true],
            'deleted_at'    =>['type'=>'datetime', 'null'=>true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('kamartipe_id', 'Kamartipe', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('tipetarif_id', 'tipetarif', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('Kamartarif');
    }

    public function down()
    {
        $this->forge->dropTable('Kamartarif');
    }
}

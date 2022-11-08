<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamartipe extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'auto_increment'=>true],
            'tipe'          => ['type'=>'varchar', 'constraint'=>100, 'null'=>true],
            'keterangan'    => ['type'=>'text', 'null'=>true],
            'urutan'        => ['type'=>'int', 'constraint'=>10, 'unsigned'=>true],
            'aktif'         => ['type'=>'enum("Y", "T")', 'default'=>'Y', 'null'=>true],
            'gamber'        => ['type'=>'varbinary', 'constraint'=>255],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kamartipe');
    }

    public function down()
    {
        $this->forge->dropTable('kamartipe');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamardipesan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => [ 'type'=>'int', 'constraint'=>10, 'unsigned'=>true, 'auto_inceremnet'=>true ],
            'pemesanan_id'      => [ 'type'=>'int', 'constraint'=>10, 'null'=>true, 'unsigned'=>true, ],
            'kamar_id'          => [ 'type'=>'int', 'constraint'=>10, 'null'=>false, 'unsigned'=>true, ],
            'tarif'             => [ 'type'=>'double', 'null'=>true ],
            'pengguna_id'       => [ 'type'=>'int', 'constraint'=>10, 'null'=>true, 'unsigned'=>true, ],
            'created_at'        => [ 'type'=>'datetime', 'null'=>true ],
            'updated_at'        => [ 'type'=>'datetime', 'null'=>true ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pemesanan_id', 'pemesanan', 'id', 'cascade', 'set null');
        $this->forge->addForeignKey('kamar_id', 'kamar', 'id', 'cascade');
        $this->forge->addForeignKey('pengguna_id', 'penggunahotel', 'id', 'cascade');
        $this->forge->createTable('kamarDipesan');
    }

    public function down()
    {
        $this->forge->dropTable('kamarDipesan');
    }
}

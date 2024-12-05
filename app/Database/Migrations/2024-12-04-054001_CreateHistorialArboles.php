<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistorialArboles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'arbol_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'fecha' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'tamano' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('arbol_id', 'arboles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('historial_arboles');
    }

    public function down()
    {
        $this->forge->dropTable('historial_arboles');
    }
}

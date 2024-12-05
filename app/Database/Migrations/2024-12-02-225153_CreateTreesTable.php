<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTreesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'especie_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'amigo_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'ubicacion' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['disponible', 'vendido'],
                'default'    => 'disponible',
            ],
            'precio' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'foto' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addForeignKey('especie_id', 'especies', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('amigo_id', 'usuarios', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('arboles');
    }

    public function down()
    {
        $this->forge->dropTable('arboles');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSpeciesTable extends Migration
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
            'nombre_comercial' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nombre_cientifico' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('especies');
    }

    public function down()
    {
        $this->forge->dropTable('especies');
    }
}

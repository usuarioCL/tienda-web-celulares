<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCelularesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'marca' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'modelo' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'precio' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],
            'almacenamiento' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'imagen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('celulares');
    }

    public function down()
    {
        $this->forge->dropTable('celulares');
    }
}

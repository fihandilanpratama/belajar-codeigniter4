<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comic extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_comic'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sampul'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_comic', true);
        $this->forge->createTable('comic');
    }

    public function down()
    {
        $this->forge->dropTable('comic');
    }
}
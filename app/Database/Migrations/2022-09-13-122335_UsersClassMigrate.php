<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersClassMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 25,
                'auto_incremenet' => true,
                'null' => false
            ],
            'name' => [
                'type' => 'TEXT',
                'constraint' => 25
            ],
            'guru_id' => [
                'type' => 'INT',
                'constraint' => 25,
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
            'deleted_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('kelas');
    }

    public function down()
    {
        $this->forge->dropTable('kelas');
    }
}

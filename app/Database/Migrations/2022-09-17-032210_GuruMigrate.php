<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GuruMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 25,
                'auto_increment' => true,
                'null' => false
            ],
            'nip' => [
                'type' => 'INT',
                'constraint' => 25,
                'null' => false
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => false
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'place_birth' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'date_birth' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'gender' => [
                'type' => "ENUM('L', 'P')"
            ],
            'photo' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'mapel_id' => [
                'type' => 'INT',
                'constraint' => 25,
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('guru');
    }

    public function down()
    {
        $this->forge->dropForeignKey('guru', 'user_id');

        $this->forge->dropTable('guru');
    }
}

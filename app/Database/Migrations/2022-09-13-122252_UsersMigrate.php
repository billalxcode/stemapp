<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigrate extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'refresh_token' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'role' => [
                'type' => "ENUM('admin','guru','siswa')"
            ],
            'status' => [
                'type' => "ENUM('active','inactive','blocked')"
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
        $this->forge->addUniqueKey(['email', 'username']);
        
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

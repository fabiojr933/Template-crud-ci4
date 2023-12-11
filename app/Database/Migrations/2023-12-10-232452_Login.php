<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Login extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_usuario'            => [
                'type'              => 'INT',
                'constraint'        => 9,
                'usigned'           => true,
                'auto_increment'    => true
            ],
            'usuario'               => [
                'type'              => 'VARCHAR',
                'constraint'        => 128
            ],
            'senha'                 => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'nome'                  => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'created_at'            => [
                'type'              => 'DATETIME'
            ],
            'updated_at'            => [
                'type'              => 'DATETIME'
            ],
            'deleted_at'            => [
                'type'              => 'DATETIME'
            ]
        ]);
        $this->forge->addKey('id_usuario', true);
        $this->forge->createTable('usuario');
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}

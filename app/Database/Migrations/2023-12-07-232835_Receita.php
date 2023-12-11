<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Receita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_receita'            => [
                'type'              => 'INT',
                'constraint'        => 9,
                'usigned'           => true,
                'auto_increment'    => true
            ],
            'nome'                  => [
                'type'              => 'VARCHAR',
                'constraint'        => 128
            ],
            'ativo'                 => [
                'type'              => 'CHAR'
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
        $this->forge->addKey('id_receita', true);
        $this->forge->createTable('receita');
    }

    public function down()
    {
        $this->forge->dropTable('receita');
    }
}

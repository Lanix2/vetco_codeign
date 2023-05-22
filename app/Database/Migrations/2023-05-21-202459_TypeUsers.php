<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TypeUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_type_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id_type_user');
        $this->forge->createTable('type_user');
    }

    public function down()
    {
        $this->forge->dropTable('type_user');
    }
}

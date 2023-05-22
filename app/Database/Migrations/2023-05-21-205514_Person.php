<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Person extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_person' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'surname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'date_birth' => [
                'type' => 'TIMESTAMP',
            ],
            'dni' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'phone' => [
                'type' => 'INT',
                'constraint' => 30,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id_person', true);
        
        $this->forge->createTable('person');
    }

    public function down()
    {
        $this->forge->dropTable('person');
    }
}

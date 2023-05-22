<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FileType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_file_type' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
           
        ]);

        $this->forge->addPrimaryKey('id_file_type');
        $this->forge->createTable('file_type');
    }
    
    public function down()
    {
        
        $this->forge->dropTable('file_type');
    }
}

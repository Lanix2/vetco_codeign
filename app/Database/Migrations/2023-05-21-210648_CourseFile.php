<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CourseFile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_course_file' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_course' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            
            'id_file' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            
        ]);

        $this->forge->addPrimaryKey('id_course_file');
        $this->forge->addForeignKey('id_file', 'file', 'id_file', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_course', 'course', 'id_course', 'CASCADE', 'CASCADE');
        $this->forge->createTable('course_file');
    }
    
    public function down()
    {
        //
        $this->forge->dropTable('course_file');
    }
}

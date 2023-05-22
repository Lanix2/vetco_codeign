<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentCourse extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_student_course' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_person' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_course' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            
        ]);
        $this->forge->addPrimaryKey('id_student_course');
        $this->forge->addForeignKey('id_person', 'person', 'id_person', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_course', 'course', 'id_course', 'CASCADE', 'CASCADE');
        $this->forge->createTable('student_course');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('student_course');
    }
}

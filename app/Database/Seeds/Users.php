<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $user = 'david';
        $pass = password_hash("123", PASSWORD_DEFAULT);
        $type = '1';
        $id_person = '1'; 

        $data = [
            'user'  =>  $user,
            'password'     =>  $pass,
            'id_type_user' => $type,
            'id_person' => $id_person
        ];

        
        

        $this->db->table('users')->insert($data);
    }
}
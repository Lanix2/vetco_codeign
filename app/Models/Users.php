<?php namespace App\Models;
    use CodeIgniter\Model;

    class Users extends Model{
        public function getUsers($data){

            $Usuario = $this->db->table('users');
            $Usuario->join('person', 'users.id_person = person.id_person');
            $Usuario->where($data);
            //var_dump($Usuario->get()->getResultArray());

            return $Usuario->get()->getResultArray();
        }
        
        public function getTypesUsers(){

            //var_dump("hola");
            $Type_user = $this->db->table('type_user');
            //var_dump($Type_user);

            return $Type_user->get()->getResultArray();
        }

        public function insert_user($data) {
            $Person = $this->db->table("person");
            $User = $this->db->table("users");
            $Student = $this->db->table("student_course");
            
            $Person->insert($data["person"]);
            $lastId = $this->db->insertID();
            
            $data["user"]["id_person"] = $lastId;
            $data["course"]["id_person"] = $lastId;
            
            $User->insert($data["user"]);
            $Student->insert($data["course"]);
            
            return $this->db->insertID();
        }

        public function update_profile($data){
            $Person = $this->db->table("person");
            $User = $this->db->table("users");

            $id_person = $data["person"]["id_person"];

            $Person->set($data["person"]);
            $Person->where("id_person", $id_person);
            
            $User->set($data["user"]);
            $User->where("id_person", $id_person);
            
            if(!empty($data["user"]["password"])) $User->update();

            return $Person->update();
        }
    }
<?php namespace App\Models;
    use CodeIgniter\Model;

    class Courses extends Model{
        public function getCourse(){

            $Course = $this->db->table('Course');
            
            
            return $Course->get()->getResultArray();
        }
        
        public function getCourseDetail($data){
            $Course = $this->db->table('Course');
            $Course->where($data);
            //var_dump($data);
            return $Course->get()->getResultArray();
        }
        
        public function insert_course($data){
            $Course = $this->db->table('Course');

            return $Course->insert($data);

        }

        public function update_course($data){
            $Course = $this->db->table('Course');
            
           // $id_course = $data["id_course"];
            $Course->set($data["course"]);
            $Course->where($data["id_course"]);
            //var_dump($data["id_course"]);
            return $Course->update();

        }

        public function insert_video($data){
            $File = $this->db->table('file');
            $Course_file = $this->db->table('course_file');

            $File->insert($data["file"]);
            $lastId = $this->db->insertID();
            
            $data["course_file"]["id_file"] = $lastId;

            $Course_file->insert($data["course_file"]);

            return $this->db->insertID();
        }

        public function getCourseVideos($id_course){
            $File = $this->db->table('file');
            $File->join('course_file', 'course_file.id_file = file.id_file');
            $File->join('course', 'course.id_course = course_file.id_course');
            $File->where('course.id_course', $id_course);

            //var_dump($File->get()->getResultArray());

            return $File->get()->getResultArray();
        }

        public function getCourseVideoOnly($id_file){
            $File = $this->db->table('file');
            $File->join('course_file', 'course_file.id_file = file.id_file');
            $File->join('course', 'course.id_course = course_file.id_course');
            $File->where('file.id_file', $id_file);

            //var_dump($File->get()->getResultArray());

            return $File->get()->getResultArray();
        }
    }
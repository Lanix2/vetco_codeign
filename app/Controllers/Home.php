<?php

namespace App\Controllers;
use App\Models\Users;
use App\Models\Courses;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function start()
    {
        return view('start');
    }
    
    public function profile()
    {
        
        $User = new Users();
        
        //var_dump(session("id_user"));
        
        $dataUser = $User->getUsers(['id_user' => session("id_user")]);
        //var_dump($dataUser);
        
        $data = ["data" => $dataUser];
        
        return view('profile', $data);
    }
    
    public function add_course($id_course = 0)
    {
        $Courses = new Courses();
        
        //var_dump(session("id_user"));
        
        $dataCourses = $Courses->getCourse();
        $dataCourseOnly = $Courses->getCourseDetail(["id_course" => $id_course]);
       // var_dump($id_course);
        //var_dump($dataCourseOnly);
        
        $data = ["data" => $dataCourses, "course" => $dataCourseOnly];

        return view('add_course', $data);
    }

    public function courses()
    {

        $Courses = new Courses();
        
        //var_dump(session("id_user"));
        
        $dataCourses = $Courses->getCourse();
        //var_dump($dataUser);
        
        $data = ["data" => $dataCourses];

        return view('courses', $data);
    }

    public function course_detail($id_course)
    {
        $Courses = new Courses();
        
        //$id_course = $this->request->getPost('user');
        
        $dataCourses = $Courses->getCourseDetail(["id_course" => $id_course]);

        $dataVideos = $Courses->getCourseVideos(["id_course" => $id_course]);
        //var_dump($id_course);
        
        $data = ["data" => $dataCourses, "videos" => $dataVideos];

        return view('course_detail', $data);
    }

    public function ver_video($id_file)
    {
        $Courses = new Courses();

        $dataVideoOnly = $Courses->getCourseVideoOnly(["id_file" => $id_file]);

        $id_course = $dataVideoOnly[0]["id_course"];

        $dataVideos = $Courses->getCourseVideos(["id_course" => $id_course]);


        $data = ["data" => $dataVideos, "video" => $dataVideoOnly];

        return view('ver_video', $data);
    }

    public function login(){


        $user = $this->request->getPost('user');
        $pass = $this->request->getPost('password');

        //var_dump($user);
        //var_dump($pass);
    

        $User = new Users();
        
        $dataUsers = $User->getUsers(['user' => $user]);

       // var_dump(count($dataUsers) > 0);

        if(count($dataUsers) > 0 && password_verify($pass, $dataUsers[0]['password']) ){
            
            $data = [
                "user" => $dataUsers[0]['user'],
                "id_person" => $dataUsers[0]['id_person'],
                "id_user" => $dataUsers[0]['id_user'],
                "type" => $dataUsers[0]['id_type_user']
            ];

            $session = session();
            $session->set($data);
           // var_dump("si");
            return redirect()->to(base_url('/start'))->with('mensaje', '1');
        }else{
            var_dump("no");
             return redirect()->to(base_url('/'))->with('mensaje', '0');
        }



        return view('start');
    }

    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('/'));
    }


    public function add_user()
    {
        $Course = new Courses();
        $Types = new Users();

        $dataCourse = $Course->getCourse();
        
        
        $dataTypes = $Types->getTypesUsers();
        //var_dump($dataTypes);

        $data = ["data" => $dataCourse, "types" => $dataTypes];

        //var_dump($data);

        return view('add_user', $data);
    }

    public function add_form_user()
    {
        $person = [
            "name" => $_POST["name"],
            "surname" => $_POST["surname"],
            "country" => $_POST["country"],
            "date_birth" => $_POST["date_birth"],
            "dni" => $_POST["dni"],
            "phone" => $_POST["phone"]
        ];
        
        $user = [
            "user" => $_POST["user"],
            "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
            "id_type_user" => $_POST["type_user"]
        ];

        $course = [
            "id_course" => $_POST["course"]
        ];

        $data = [
            "person" => $person,
            "user" => $user,
            "course" => $course
        ];

        //var_dump($data);
        $Users = new Users();
        
        $res = $Users->insert_user($data);

        if($res > 0 ){
            return redirect()->to(base_url()."/add_user")->with("mensaje", "1");
        }else{
            return redirect()->to(base_url()."/add_user")->with("mensaje", "0");
            
        }
    }

    public function update_profile($data){
        $person = [
            "id_person" => $data,
            "name" => $_POST["name"],
            "surname" => $_POST["surname"],
            "country" => $_POST["country"],
            "date_birth" => $_POST["date_birth"],
            "dni" => $_POST["dni"],
            "phone" => $_POST["phone"]
        ];

        $pass = empty($_POST["password"]) ? "" : password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $user = [            
            "password" => $pass,
        ];


        $data = [
            "person" => $person,
            "user" => $user
        ];

        //var_dump($data);
        $Users = new Users();
        
        $res = $Users->update_profile($data);

        if($res ){
            return redirect()->to(base_url()."/profile")->with("mensaje", "1");
        }else{
            return redirect()->to(base_url()."/profile")->with("mensaje", "0");
            
        }

    }

    public function add_form_course($id_curso = 0){

        $course = [
            "course" => $_POST["course"],
            "desc" => $_POST["desc"],
            "hours" => $_POST["hours"],
            
        ];
        
        
        if($_FILES["image"]["error"] !== 4){
            $file = $this->request->getFile('image');
            //var_dump($file);
            //if()
            $res = $this->upload_file($file);
            
            if(!$res["error"]) return false;

            $course["image"] = $res["name"];
            
        }
        //$path_image = $res["path"] . $res["name"];
        
        

        

        $Course = new Courses();
        
        if($id_curso > 0){
            $data = [
                "id_course" => ["id_course" => $id_curso],
                "course" => $course
            ];
            $res = $Course->update_course($data);
            
        }else{
            $data = $course;
            $res = $Course->insert_course($data);
        }

        if($res){
            return redirect()->to(base_url()."/add_course")->with("mensaje", "1");
        }else{
            return redirect()->to(base_url()."/add_course")->with("mensaje", "0");
            
        }



    }

    public function upload_file($file){
        if (! $file->hasMoved()) {
            $newName = $file->getRandomName();

            $path = FCPATH . "uploads";
            
            $file->move( $path, $newName);
            
            
            return ["error" => true, "path" => $path, "name" => $newName];
        } else {
            return ['error' => false];
            
        }
    }

    public function add_video($id_course){
        $file = $this->request->getFile('video');
        
        $res = $this->upload_file($file);
        
        if(!$res["error"]) return false;

        //$path_image = $res["path"] . $res["name"];
        $name = $res["name"];
        

        $file = [
            "title" => $_POST["title"],
            "file" => $name,
            "id_file_type" => 1
        ];

        $file_course = [
            "id_course" => $id_course
        ];

        $data = [
            "file" => $file,
            "course_file" => $file_course
        ];

        $Course = new Courses();
        
        $res = $Course->insert_video($data);

        if($res){
            return redirect()->to(base_url()."/course_detail/$id_course")->with("mensaje", "1");
        }else{
            return redirect()->to(base_url()."/course_detail/$id_course")->with("mensaje", "0");
            
        }
    }
    
}

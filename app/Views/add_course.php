
<?php

    //var_dump($course);
    $curso = "";
    $desc = "";
    $horas = "";
    $image = "";
    $nuevo = true;
    $post_course = base_url('/add_form_course');
    $button = "Agregar Curso";
    $image_url = "";
    if(!empty($course)){
        $id_curso = $course[0]["id_course"]; 
        $curso = $course[0]["course"];
        $desc = $course[0]["desc"];
        $horas = $course[0]["hours"];
        $image = $course[0]["image"];
        $nuevo = false;
        $post_course = base_url('/add_form_course/') . $id_curso ;
        $button = "Actualizar curso";
        $image_url =  "<img src='" . base_url() . "uploads/" . $image . "' width = '300px'> <br>";
    }
    //var_dump($image);



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <title>Login</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo session('user')?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/start')?>">Atras <span class="sr-only"></span></a>
      </li> 
    </ul>
    
  </div>
</nav>
    
<div class="container">
    
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1>Nuevo Curso</h1>
            <form action="<?php echo $post_course?>" method="POST" enctype="multipart/form-data">
                <label for="course">Nombre del Curso</label>
                <input type="text" name ="course" class = "form-control" required value="<?php echo $curso?>">
                <label for="desc">Descripción</label>
                <input type="text" name ="desc" class = "form-control" value="<?php echo $desc?>">
                <label for="hours">Horas del curso</label>
                <input type="number" name ="hours" class = "form-control" value="<?php echo $horas?>">
                <label for="image">Imagen del curso</label>
                <input type="file" name ="image" class = "form-control" >
                
                <?php echo $image_url?>
                
                <br>
                <button class="btn btn-primary"><?php echo $button?></button>
            </form>
            <br>
            <h1>Cursos</h1>
            <?php foreach ($data as $row) { ?>
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo base_url() . 'uploads/' . $row["image"]?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["course"]?></h5>
                    <p class="card-text"><?php echo $row["desc"]?></p>
                    <a href="<?php echo base_url('/add_course/') . $row["id_course"]?>" class="btn btn-primary">Editar</a>
                </div>
                </div>
                <br>
            <?php }?>
        </div>
        <div class="col-sm-4">
        
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
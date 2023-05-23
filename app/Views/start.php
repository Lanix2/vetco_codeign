<?php

//var_dump(session("type"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <title>Inicio</title>
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
        <a class="nav-link" href="<?php echo base_url('/profile')?>">Perfil <span class="sr-only"></span></a>
      </li>
      <?php if(session("type") > 1 ){?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/add_user')?>">Agregar usuario <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/add_course')?>">Agregar curso <span class="sr-only"></span></a>
      </li>
      <?php }?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/courses')?>">Cursos<span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/logout')?>">Salir <span class="sr-only"></span></a>
      </li>
     
     
    </ul>
    
  </div>
</nav>
    
<div class="container">
    
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1>Inicio</h1>
            
            
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
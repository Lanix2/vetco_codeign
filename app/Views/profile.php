
<?php

$person = $data[0];
//var_dump($person["date_birth"]);
?>
<!DOCTYPE html>
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
            <h1>Perfil</h1>
            <form action="<?php echo base_url('/update_profile/') . session("id_person") ?>" method="POST" >
                <label for="name">Nombre</label>
                <input type="text" name ="name" class = "form-control" value="<?php echo $person["name"]?>">
                <label for="surname">Apellido</label>
                <input type="text" name ="surname" class = "form-control" value="<?php echo $person["surname"]?>">
                <label for="country">País</label>
                <input type="text" name ="country" class = "form-control" value="<?php echo $person["country"]?>">
                <label for="date_birth">Fecha de nacimiento</label>
                <input type="date" name ="date_birth" class = "form-control" value="<?php echo substr($person["date_birth"], 0 , 10)?>">
                <label for="dni">Dni</label>
                <input type="text" name ="dni" class = "form-control" value="<?php echo $person["dni"]?>">
                <label for="phone">Celular</label>
                <input type="text" name ="phone" class = "form-control" value="<?php echo $person["phone"]?>">
                <label for="user">Usuario</label>
                <input type="text" name ="user" class = "form-control" disabled value="<?php echo $person["user"]?>">
                <label for="password">Contraseña</label>
                <input type="text" name ="password" class = "form-control" >
               
                
                
                <br>
                <button class="btn btn-primary">Actualizar</button>
            </form>
            
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
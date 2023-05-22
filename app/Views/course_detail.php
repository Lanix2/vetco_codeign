
<?php

//var_dump($data);
$curso = $data[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Cursos</title>
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
        <a class="nav-link" href="<?php echo base_url('/courses')?>">Atras <span class="sr-only"></span></a>
      </li> 
    </ul>
    
  </div>
</nav>
    
<div class="container">
    
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            
            <div class="card mb-3">
                <img class="card-img-top" src="<?php echo base_url() .'uploads/' . $curso["image"]?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $curso["course"]?></h5>
                    <p class="card-text"><?php echo $curso["desc"];?></p>
                    <p class="card-text"><small class="text-muted">Carga horaria: <?php echo $curso["hours"]?> horas</small></p>
                    <?php if(session("type") > 1 ){?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="upload_video" >Subir Video</button>
                    <?php }?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"id="ver_video" >Ver Video</button>
                </div>
            </div>
            
        </div>
        <div class="col-sm-4"></div>
    </div>

 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_body">
    
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
    
    const ver_video = document.querySelector("#ver_video")
    const modal_body = document.querySelector("#modal_body")

    ver_video.onclick = () => {
        modal_body.innerHTML = `

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subir video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($videos as $row) { ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["title"]?></h5>
                                <a href="<?php echo base_url('/ver_video/') . $row["id_file"]?>" class="btn btn-primary">Ver</a>
                            </div>
                        <?php }?>
                    </div>
                    <div class="modal-footer">
                        
                        
                    </div>
                </div>
            
            
            
        `
    }
    <?php if(session("type") > 1 ){?>
    const upload_video = document.querySelector("#upload_video")
    upload_video.onclick = () => {
        modal_body.innerHTML = `
            <form action="<?php echo base_url('/add_video/') . $curso["id_course"]?>" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subir video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            <label for="title">Titulo del video</label>
                            <input type="text" name ="title" class = "form-control">
                            <label for="video">Video</label>
                            <input type="file" name ="video" class = "form-control" >
                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary">Cargar</button>
                </div>
                </div>
            </form>
        `
    }
<?php }?>
   

</script>
</body>
</html>
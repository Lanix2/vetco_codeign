
<?php

//var_dump($data);
//$video = $data[0];
$id_course = $video[0]["id_course"];
$title_video = $video[0]["title"];
$video_src = $video[0]["file"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <title>Videos</title>
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
        <a class="nav-link" href="<?php echo base_url('/course_detail/') . $id_course?>">Atras <span class="sr-only"></span></a>
      </li> 
    </ul>
    
  </div>
</nav>
    
<div class="container">
    
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1><?php echo $title_video?></h1>
            <br>
            <div class="card mb-3">
                <video src="<?php echo base_url() . 'uploads/' . $video_src?>" controls></video>
                
            </div>

            <div class="card text-center">
               <?php foreach ($data as $row) { ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["title"]?></h5>
                    <a href="<?php echo base_url('/ver_video/') . $row["id_file"]?>" class="btn btn-primary">Ver</a>
                </div>
               <?php }?>
            </div>
            
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
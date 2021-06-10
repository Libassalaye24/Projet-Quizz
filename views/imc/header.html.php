<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <?php 
     
     $remage = ROUTE_DIR. "public/img/background.jpeg";
     $type = pathinfo($remage,PATHINFO_EXTENSION);
     $data = file_get_contents($remage, PATHINFO_EXTENSION); 
     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  
  ?>
  <style>
    body{
      background-image: url(<?= $base64 ?>);
    }
.container-fluid{
 
  text-align: center;
  background-color: #C90017;
  border: 1px solid #C90017;
  color: #fff;
  height: 90px;
}
img{
    margin-top: -1%;
    margin-left: -98%;
  }
  </style>
  
  <body>
  <div class="container-fluid">
        <header>
          <?php
              $remonteImage = ROUTE_DIR. "public/img/logo.png";
              $type = pathinfo($remonteImage,PATHINFO_EXTENSION);
              $data = file_get_contents($remonteImage, PATHINFO_EXTENSION); 
              $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
                        <img src="<?=$base64?>" alt="tes">

            
            <h1 style="margin-top:-4.5%;">
              Le plaisisr de jouer
            </h1>
        </header>
    </div> 
    
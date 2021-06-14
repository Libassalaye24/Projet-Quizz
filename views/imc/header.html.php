<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewsport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'css/style.css' ?>">
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
    background-color: #c90017;
    border: 1px solid #c90017;
    height: 90px;
    padding: 0;
  }
   .titre h1{
      text-align: center;
      color: #fff;
    word-wrap: nowrap;
    font-size: 32px;
    margin-top: 20px;
    }
    img{
      float:left ;
      width: 120px;
      height: 90px;
      margin-left: -2%;
      margin-top: -21px;
    }


  </style>
  
  <body>
  <div class="container-fluid">
         
              <div class="titre ">
                  <img class="" src="<?= WEB_ROUTE.'img/logo.png' ;?>" alt="">
                  <h1 style="text-align: center;">Le plaisir de jouer</h1>
              </div>
              
         
      </div>
 
    
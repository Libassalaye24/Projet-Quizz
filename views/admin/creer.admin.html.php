
<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
  // require_once(ROUTE_DIR.'views/imc/header.html.php'); 
   $inscription="";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'css/style.css' ?>">
  </head>
  <body>
    <div class="container  conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-white mt-3 ml-4 font-weight-bold">  CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-light interface jhg">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12  shadow p-3 mb-5 bg-white rounded inscript">
               <?php if(isset($_SESSION['success_Inscript'])){
                   $inscription=$_SESSION['success_Inscript'];                   
               }

                ?>
                <?php if(isset($_SESSION['success_Inscript'])): ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?=$inscription?></h4>
                     </div>
                    <?php endif ?>
            <?php   require_once(ROUTE_DIR.'views/security/inscription2.html.php');  ?>
           </div>
        
       
      </div>
      <style>
          .interface{
            padding: 12px;
        }
       /*  .container{
            height: 700px;
        }
        .jhg{
            height: 1000px;
        } */
      </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
    if(isset($_SESSION['success_Inscript'])){
        unset($_SESSION['success_Inscript']);
        
    }
?>
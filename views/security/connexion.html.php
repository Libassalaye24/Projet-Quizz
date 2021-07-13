<?php 
if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}

 
 require_once(ROUTE_DIR.'views/imc/header.html.php');

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
     <style>
  
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

<div class="container-fluid">
       
            <div class="titre ">
                <img class="" src="<?= WEB_ROUTE.'img/logo.png' ;?>" alt="">
                <h1 style="text-align: center;">Le plaisir de jouer</h1>
            </div>
            
       
    </div>
      <div class="container mt-10 bordure col-sm-9 col-md-10  col-xs-12 col-lg-10">
        
        <div class="row mt-5 "> 
          <div class="col-sm-9 col-xs-12   mx-auto  " style="margin-top: 6%;">
            <div class="card ">
              <div class="card-body">
                <h3 class="card-title text-center " style="color: #C90017;"><b>Login Form</b></h3> <br>
                 
                  <form  method="POST" action="<?=WEB_ROUTE?>">
                  <input type="hidden" name="controlleurs" value="security">
                  <input type="hidden" name="action" value="connexion">
  <?php if(isset($arrayError['erreurConnexion'])):?>
              <div class="alert alert-danger" role="alert">
                <strong><?php echo isset($arrayError['erreurConnexion']) ? $arrayError['erreurConnexion']: "" ; ?></strong>
              </div>
   <?php endif ?>
                  <div class="input-group ">

                          <label for=""> </label>
                            <input type="text" id="" name="login" class="form-control cnx  btn-lg input_user" placeholder="Email address"  >
                                  <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                                  </div>
                     </div>
                          <div class="danger">
                            <?= isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
                          </div>
                          
                          <div class="custom-control custom-checkbox mb-3">
                              
                          </div>

                          <div class="input-group">
                          <label for=""></label>
                            <input type="password" id="" name="password" class="form-control cnx  btn-lg input_lock " placeholder="Password" >
                            <div class="input-group-append">
                                      <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                  </div>
                          </div>
                          <div class="danger">
                            <?= isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
                          </div>
                          

                          <div class="custom-control custom-checkbox mb-3">
                              
                          </div>
                          <button class="btn btn-lg  btn-block  text-uppercase submit" type="submit"><b>Connexion</b></button>
                          <hr class="my-4">
                          <div>
                          <a href="<?= WEB_ROUTE.'?controlleurs=security&views=inscription'?>"><b>S'inscrire pour jouer?</b> </a>
                          </div>
                      </form>
                
              </div>
            </div>

          </div>
        </div>
     </div>
     </div>



     <?php 
 
 require_once(ROUTE_DIR.'views/imc/footer.html.php');

?>




   
 

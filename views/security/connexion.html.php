<?php 
if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}

 
 require_once(ROUTE_DIR.'views/imc/header.html.php');

?>
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

<body>
<div class="container-fluid">
       
            <div class="titre ">
                <img class="" src="<?= WEB_ROUTE.'img/logo.png' ;?>" alt="">
                <h1 style="text-align: center;">Le plaisir de jouer</h1>
            </div>
            
       
    </div>
      <div class="container mt-10 bordure col-10 col-md-12">
        
        <div class="row mt-5 "> 
          <div class="col-sm-9  col-lg-5 mx-auto  " style="margin-top: 6%;">
            <div class="card">
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




   
 

<?php

 if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
 require_once(ROUTE_DIR.'views/imc/header.html.php');
 if (est_admin()) {
  require_once(ROUTE_DIR.'views/imc/menu.html.php');
}


?>
 
    
         <div class="container mt-5 bordure col-10 col-md-12 ">
            <div class="row mt-5 col-sm-15  "> 
              <div class="col-sm-9 col-lg-5 mx-auto " style="margin-top: -2.5%;">
                <div class="card ">
                  <div class="card-body ">
                      
                    <h3 class="card-title " style="color:#c90017;" ><b>S'inscrire</b></h3>
                    <h5>Tester votre niveau de culture generale</h5>
                      <form   method="POST"  action="<?php WEB_ROUTE?>" enctype="multipart/form-data"  >
                        <input type="hidden" name="controlleurs" value="security">
                        <input type="hidden" name="action" value="inscription">
                      <label for="" class="ml-3"><b>Prenom </b></label>  
                      <div class="input-group col-md-8"> 
                                <input type="text" id="" name="prenom" class="form-control  btn-lg input_user" placeholder="prenom" value=""  >
                        </div>
                        <div class="danger">
                            <?=isset($arrayError['prenom']) ? $arrayError['prenom'] : ""; ?>
                          </div>
                        <br>
                        
                        <label for="" class="ml-3"><b>Nom</b> </label>
                        <div class="input-group col-md-8">
                                <input type="text" id="" name="name" class="form-control  btn-lg input_user" placeholder="nom"  >
                          
                        </div>
                        <div class="danger">
                            <?=isset($arrayError['name']) ? $arrayError['name'] : ""; ?>
                          </div>
                        <br>
                                <label for="" class="ml-3"><b>login </b></label>
                            <div class="input-group col-md-8">
                                <input type="text" id="" name="login" class="form-control  btn-lg input_lock" placeholder="Email address"  >
                                <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                                      </div>
                                </div>  
                                
                                <div class="danger">
                                <?=isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
                          </div>
                         
                            <br>
                            <label for="" class="ml-3"><b>Password</b></label>
                            <div class="input-group col-md-8">
                                    <input type="password" id="" name="password" class="form-control  btn-lg input_lock " placeholder="Password" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                            <?=isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
                          </div>
                              <br>
                              <label for="" class="ml-3"><b>Confirm Password</b></label> 
                            <div class="input-group col-md-8">
                                    <input type="password" id="" name="password2" class="form-control  btn-lg input_lock " placeholder="Confirm Password" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                            <?=isset($arrayError['password2']) ? $arrayError['password2'] : ""; ?>
                          </div>
                              <br>
                              
                              <div class="col-md-8">
                                <label for="file" ><b>Choisir un Avatar</b></label>
                                    <input type="file" name="file1" class="form-control item " id="file"  />
                               </div>
                               <div class="danger">
                                 <?php echo isset($arrayError['file1']) ? $arrayError['file1'] : ""; ?>
                               </div>
                              
                              <br>
                              <button type="submit" class="btn btn-lg  btn-block   red" name="submit" ><b>Inscription</b></button>

                          </form>
                    
                  </div>
                </div>

              </div>
            </div>
         </div>
<?php 
   require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>

  
<?php 
 
 require_once(ROUTE_DIR.'views/imc/header.html.php');

?>

      
    
         <div class="container mt-10 bordure col-10 col-md-12">
            <div class="row mt-5 "> 
              <div class="col-sm-9  col-lg-5 mx-auto  " style="margin-top: 6%;">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center " style="color: #C90017;">Login Form</h3>
                      <form action="" method="post">
                      <div class="input-group ">
  
                              <label for=""> </label>
                                <input type="text" id="" name="login" class="form-control  btn-lg input_user" placeholder="Email address"  >
                                      <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                                <?=isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
                              </div>
                              
                              <div class="custom-control custom-checkbox mb-3">
                                  
                              </div>

                              <div class="input-group">
                              <label for=""></label>
                                <input type="password" id="" name="password" class="form-control  btn-lg input_lock " placeholder="Password" >
                                <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                                <?=isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
                              </div>
                              

                              <div class="custom-control custom-checkbox mb-3">
                                  
                              </div>
                              <button class="btn btn-lg  btn-block  text-uppercase red" type="submit">Sign in</button>
                              <hr class="my-4">
                              <div>
                                <a href="">Vous n'avez pas de compte ? </a>
                              <a href="<?= WEB_ROUTE.'?controlleurs=security&view=inscription'?>"><b>S'inscrire</b> </a>
                              </div>
                          </form>
                    
                  </div>
                </div>

              </div>
            </div>
         </div>
<?php 
   require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
<style>
 @media  screen{
    img{
      margin-top: -5%;
    }
 }  
  .red{
    background-color: #C90017;
    color: #fff;
    
  }
  img{
  margin-top: -1.5%;
    margin-left: -98%;
}
  .container-fluid{
 text-align: center;
 background-color: #C90017;
 border: 1px solid #C90017;
 color: #fff;
 height: 84px;
    
}
  .red:hover{
    background-color: #fff;
    color: #C90017;
    border-color: #C90017;
  }
  
  .form-control{
    background-color: #ddd;
  }
 

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

  
</style>
  
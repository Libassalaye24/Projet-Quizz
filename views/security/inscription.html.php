<?php 
 
 require_once(ROUTE_DIR.'views/imc/header.html.php');

?>
 
    
         <div class="container mt-5 bordure col-10 col-md-12 ">
            <div class="row mt-5 col-sm-15  large"> 
              <div class="col-sm-9 col-lg-5 mx-auto " style="margin-top: -1.8%;">
                <div class="card ">
                  <div class="card-body ">
                      
                    <h3 class="card-title " style="color:#c90017;" >S'inscrire</h3>
                    <h4>Tester votre niveau de culture generale</h4>
                      <form action="" method="post">
                      <label for="" class="ml-3"><b>Prenom </ b></label>  
                      <div class="input-group col-md-6"> 
                                <input type="text" id="" name="prenom" class="form-control  btn-lg input_user" placeholder="prenom"  >
                        </div>
                        <br>
                        <label for="" class="ml-3"><b>Nom</b> </label>
                        <div class="input-group col-md-6">
                                <input type="text" id="" name="name" class="form-control  btn-lg input_user" placeholder="nom"  >
                          
                        </div>
                        <br>
                                <label for="" class="ml-3"><b>login </b></label>
                            <div class="input-group col-md-6">
                                <input type="text" id="" name="login" class="form-control  btn-lg input_lock" placeholder="Email address"  >
                                <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                                      </div>
                                </div>   
                         
                            <br>
                            <label for="" class="ml-3"><b>Password</b></label>
                            <div class="input-group col-md-6">
                                    <input type="password" id="" name="password" class="form-control  btn-lg input_lock " placeholder="Password" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <br>
                              <label for="" class="ml-3"><b>Confirm Password</b></label> 
                            <div class="input-group col-md-6">
                                    <input type="password" id="" name="password2" class="form-control  btn-lg input_lock " placeholder="Confirm Password" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <br>
                              
                              <div class="col-md-6">
                                <label for="" class=""><b>Choisir un Avatar</b></label>
                                    <img href="" />
                                    <input type="file" name="avatar" class="form-control item"  />
                                   
                               </div>
                              <br>
                              
                              <button class="btn btn-lg  btn-block col-md-3 ml-2 red" type="submit"><p>Inscription</p></button>
                    
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
.fhj{
    width: 25px;
}
.large{
  width: 170%;
  margin-left: -35%;
  margin-top: 14%;
}

img{
  margin-top: -1.5%;
    margin-left: -98%;
}
body{
  overflow-x: hidden;
}
.form-control{
  background-color: #ddd;
}
  .red{

    background-color: #C90017;
    width: 140px;
    height: 40px;
    color: #fff;
  }
  .red p{
    margin-top: -2.5%;
  }
  .red:hover{
    background-color: #fff;
    color: #C90017;
    width: 140px;
    height: 40px;
    border-color: #C90017;
}
  
 
  .container-fluid{
 text-align: center;
 background-color: #C90017;
 border: 1px solid #C90017;
 color: #fff;
 height: 84px;
    
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
  
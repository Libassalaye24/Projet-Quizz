
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
           
            <h3 class="text-white mt-3 text-center font-weight-bold ml-4"> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h3>

                <ul class="ml-auto mt-2 ">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-light">
            <div class="col-md-8 bg-dark">
                <div class="row mx-auto bg-danger mt-4 ">
                  <p class="text-center text-white"> Question 1/5 <br>
                    les langages du Web</p> 
                </div>
                <div class="row bg-light">

              <input type="checkbox" name="coudy"> <br>
              <input type="checkbox" name="coudy"> <br>
              <input type="checkbox" name="coudy"> <br>
              <input type="checkbox" name="coudy"> 
              
            </div>
                </div>
            
            <div class="col-md-4 bg-primary">
                    meilleures scores
                </div>
        </div>
       
        
       
    </div>
    
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
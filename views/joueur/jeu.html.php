
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
       
        
       
    </div>
    
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
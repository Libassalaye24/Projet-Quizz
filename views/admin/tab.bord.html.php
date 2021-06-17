<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold">PARAMETRER VOS QUIZZ</h3>
                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white interface">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-light jhg">
               
            </div>
        </div>
        
       
    </div>
    <style>
         .interface{
            padding: 12px;
        }
        .container{
            height: 900px;
        }
        .jhg{
            height: 700px;
        }
        
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
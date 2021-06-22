
<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
   $inscription="";
?>
    <div class="container  conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold">  CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white interface jhg">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-light inscript">
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
        .container{
            height: 700px;
        }
        .jhg{
            height: 1000px;
        }
      </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
    if(isset($_SESSION['success_Inscript'])){
        unset($_SESSION['success_Inscript']);
        
    }
?>
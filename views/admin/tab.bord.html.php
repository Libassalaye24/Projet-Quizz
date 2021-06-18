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
            <div class="col-md-8 col-sm-12 bg-light ">
                <div class="progress">
                <label for="file">Nombre de joueur: </label>
                <progress id="file" value="82" max="100">  </progress>
                </div>
                <div class="progress">
                <label for="file">Nombre de admin: </label>
                <progress id="file" value="62" max="100">  </progress>
                </div>
                <div class="progress">
                <label for="file">Nombre de question: </label>
                <progress id="file" value="72" max="100">  </progress>
                </div>
            </div>
        </div>
        
       
    </div>
    <style>
         .interface{
            padding: 12px;
        }
        .container{
            height: 600px;
        }
        .jhg{
            height: 700px;
        }
        .progress{
            margin-top: 10%;
            background-color: none;
            
        }
        progress{
            width: 60%;
            height: 1000px;
        }
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
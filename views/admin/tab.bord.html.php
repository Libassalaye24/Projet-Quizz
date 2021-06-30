<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-white mt-3 ml-4 font-weight-bold">CREER ET PARAMETRER VOS QUIZZ</h3>
                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-light   p-md-2 interface ">
             <?php
                     // 1 lire le contenu du fichier
                    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
                    // 2 convertir le json
                    $arrayUser = json_decode($json ,true);
                       // 1 lire le contenu du fichier
                       $js= file_get_contents(ROUTE_DIR.'data/question.json');
                       // 2 convertir le json
                       $arrayQuestion = json_decode($js ,true);

                    $cptj=$cpta=$cptq=0;
                   foreach ($arrayUser as $user) {
                       if ($user['role']=='ROLE_JOUEUR') {
                           $cptj++;
                       }elseif ($user['role']=='ROLE_ADMIN') {
                           $cpta++;
                       }
                   }
                   $cptq=0;
                   foreach ($arrayQuestion as $question) {
                       
                           $cptq++;
                       
                   }
                ?>
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white mt-md-4 mt-sm-4  shadow p-3 mb-5  rounded">

                <div class="column joueur">
                    <div class="shadow p-3 mb-5 bg-light rounded">
                        <p class="text-center text-danger">Nombre de joueur: <?=$cptj?></p>
                    </div>
                </div>
                <div class="column">
                    <div class="shadow p-3 mb-5 bg-light rounded">
                        <p class="text-center text-primary">Nombre  d'admin: <?=$cpta?></p>
                    </div>
                </div>
                <div class="column">
                    <div class="shadow p-3 mb-5 bg-light rounded">
                        <p class="text-center text-success">Nombre de question: <?=$cptq?></p>
                    </div>
                </div>
                
               <!--  <div class="progress ">
                    <label for="file" >Nombre de joueur: </label>
                    <progress id="file1"  value="<?=$cptj?>" max="100" >  </progress><?=$cptj?>
                </div>

                <div class="progress">
                    <label for="file">Nombre de admin: </label>
                    <progress id="file" value="<?=$cpta?>" max="100" >  </progress><?=$cpta?>
                </div>

                <div class="progress">
                    <label for="file">Nombre de question: </label>
                    <progress   id="file" value="<?=$cptq?>" max="100"> 72% </progress><?=$cptq?>
                </div> -->
            </div>
        </div>
        
       
    </div>
    <style>
        .column{
            margin-top: 7%;
        }
         .interface{
            padding: 12px;
        }
        .container{
            height: 600px;
        }
        .jhg{
            height: 700px;
        }
        label{
            margin-top: 2%;
        }
        .progress{
            margin-top: 10%;
            background-color: white;
            width: 100%;
            height: 60px;
            
        }
        .borde{
            border: 2px #ddd solid;
        }
        #file1{
            background-color: #ddd;
        }
        #file{
            background-color: #ddd;
        }
        progress{
            width: 60%;
            height: 1000px;
        }
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
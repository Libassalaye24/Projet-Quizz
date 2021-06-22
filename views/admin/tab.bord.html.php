<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold">CREER ET PARAMETRER VOS QUIZZ</h3>
                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white interface">
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
            <div class="col-md-8 col-sm-12 bg-white ">
                <div class="progress ">
                    <label for="file" >Nombre de joueur: </label>
                    <progress id="file1" value="<?=$cptj?>" max="100" >  </progress><?=$cptj?>
                </div>

                <div class="progress">
                    <label for="file">Nombre de admin: </label>
                    <progress id="file" value="<?=$cpta?>" max="100" >  </progress><?=$cpta?>
                </div>

                <div class="progress">
                    <label for="file">Nombre de question: </label>
                    <progress   id="file" value="<?=$cptq?>" max="100"> 72% </progress><?=$cptq?>
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
        label{
            margin-top: 2%;
        }
        .progress{
            margin-top: 10%;
            background-color: white;
            width: 100%;
            height: 60px;
            
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
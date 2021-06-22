
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 

   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-white conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold " >CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white  ">
            <div class="col-4 mt-5">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white mt-2 rounded jhg">
                <h4 style="padding:4px;text-align:center; " >Liste des joueurs par score</h4>
               <div class="border border-danger ">
               <?php
                     // 1 lire le contenu du fichier
                    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
                    // 2 convertir le json
                    $arrayUser = json_decode($json ,true);
                   
                ?>
                <table class="table ">
                    
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                           <?php foreach($arrayUser as $user ): ?>
                             <?php if($user['role'] != 'ROLE_ADMIN'): ?>
                                <tr>
                                    <td><?php echo $user['name'] ?></td>
                                    
                                    <td><?php echo $user['prenom'] ?></td>
                                    
                                    <td><?php echo $user['score'] ?></td>
                                </tr>
                             <?php endif ?>
                            <?php endforeach ?>
                    
                       
                        
                    </tbody>
                </table>
               
               </div>
               <button type="submit" class="button " name="pagin-jour">Suivant</button>
            </div>
        </div>
        
       
    </div>
    <style>
           .interface{
               height: 900px;
               padding: 12px;
           }
           .container{
            height: 1000px;
        }
        .jhg{
            height: 800px;
        }
        .button{
            background-color: #c90017;
            float: right;
            height: 40px;
            width: 100px;
            color: #fff;
            border-color: #c90017;
            margin-top: 2%;
        }
        .button:hover{
            background-color: #fff;
            color: #c90017;
            height: 40px;
            width: 100px;
            transition: all 0,5s;
        }
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
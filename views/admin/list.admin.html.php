
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 

   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
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
        <div class="row bg-white  " >
            <div class="col-4 mt-3 " >
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white mt-2 border border-danger rounded    jhg">
                <h4 style="padding:4px;text-align:center; " >Liste des Admins</h4>
               <div class=" ">
               <?php
                     // 1 lire le contenu du fichier
                    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
                    // 2 convertir le json
                    $arrayUser = json_decode($json ,true);
                   
                ?>
                <table class="table p-0 table-bordered">
                    
                    <thead>
                        <tr>
                            <th scope="col">NOM & PRENOM</th>
                            <th scope="col">ROLE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    <?php foreach($arrayUser as $user ): ?>
                        <?php if($user['role'] != "ROLE_JOUEUR"): ?>
                            <?php if($i<=15): ?>
                                <tr>
                                    <td style="font-size: larger;"><?php echo $user['name'].'  '.$user['prenom'] ?></td>
                                    <td><?php echo $user['role'] ?></td>
                                    <td> 
                                        <a name="" id="" class="btn btn-secondary " href="<?= WEB_ROUTE.'?controlleurs=security&views=edit&id='.$user['id']?>" role="button">modifier <ion-icon name="create-outline"></ion-icon></a>
                                    </td>
                                </tr>
                            <?php $i=$i+1; ?> 
                            <?php endif ?>
                            <?php endif ?>
                     <?php endforeach ?>
                    </tbody>
                </table>
               
               </div>
               <a name="" id="" class="btn  svt mt-2" href="#" role="button">suivant</a>

            </div>
        </div>
        
       
    </div>
    <style>
           .interface{
               height: 900px;
               padding: 12px;
           }
           /* .container{
            height: 1400px;
        } */
        .jhg{
/*             height: 1000px;
 */            padding: 12px;
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
        .svt{
            float: right;
            margin-right: 3%;
            background-color: #c90017;
            color: #fff;
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
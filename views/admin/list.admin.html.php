
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 

   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-white mt-3 ml-4 font-weight-bold " >CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
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
                    $list_user =[];
                    $nbrPage =0;
                    $page=1;
                    $suivant=1;
                    $nbrElement = 15;
                    $prec = $suivant-1;
                  //  $_SESSION['user_admin'] =  $arrayUser;
                  $admin_user=[];
                  foreach ($arrayUser as $user) {
                      if ($user['role']=='ROLE_ADMIN') {
                          $admin_user[]=$user;
                      }
                     
                  }
                /*   if (!isset($_GET['page'])) {
                    $_SESSION['suivant'] = $_GET['suivant'];
                   $suivant = $_SESSION['suivant'] ;
                    $_SESSION['user_admin'] =  $admin_user;
                    $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                    $list_user= get_element_to_display( $_SESSION['user_admin'],$page, $nbrElement);
                    //$nbr_user= count($list_user);
                   
                } */

                if (!isset($_GET['suivant'])) {
                    //$suivant  = $_GET['suivant'];
                   
                    $_SESSION['user_admin'] =  $admin_user;
                    $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                    $list_user= get_element_to_display( $_SESSION['user_admin'],$suivant, $nbrElement);
                   // $_GET['suivant']++;
                    //$nbr_user= count($list_user);
                   
                }

                if (isset($_GET['suivant'])) {
                  
                    if (isset($_SESSION['user_admin'])) {
                        $_SESSION['user_admin'] =  $admin_user;
                        $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                        $list_user= get_element_to_display( $_SESSION['user_admin'],$suivant, $nbrElement);
                        $_GET['suivant']++;
                    
                       // $nbr_user= count($list_user);
                    }
                   // $_GET['suivant']++;
                   
                }
               
                   /* if (isset($_GET['page'])) {
                      
                    $page=$_GET['page'];
                        if (isset($_SESSION['user_admin'])) {
                            $_SESSION['user_admin'] =  $admin_user;
                            $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                            $list_user= get_element_to_display( $_SESSION['user_admin'],$page, $nbrElement);
                           // $nbr_user= count($list_user);
                        }

                    } */
                   // unset($_GET['page']);
                   
                 
                    

                   
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
                    <?php /* $i=0; */  ?>

                    <?php foreach($list_user as $user ): ?>
                        <?php //if($user['role'] == "ROLE_JOUEUR"): ?>
                                <tr>
                                    <td style="font-size: larger;"><?php echo $user['name'].'  '.$user['prenom'] ?></td>
                                    <td><?php echo $user['role'] ?></td>
                                    <td> 
                                        <a name="" id="" class="btn btn-secondary " href="<?= WEB_ROUTE.'?controlleurs=security&views=edit&id='.$user['id']?>" role="button">modifier <ion-icon name="create-outline"></ion-icon></a>
                                    </td>
                                </tr>
                            <?php   // endif ?>
                     <?php endforeach ?>
                    </tbody>
                </table>
               
               </div>
               <a name="" id="" class="btn btn-danger   mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&precedent='.$nbrPage  ?>" role="button">Precedent</a>
               <a name="" id="" class="btn btn-danger suiv  mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&suivant='.$nbrPage?>" role="button">Suivant</a>

               <!-- <?php //for($i=1;$i<=$nbrPage;$i++): ?>
                    <a name="" id="" class="btn btn-danger   mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$i?>" role="button"><?=$i?></a>
               <?php    // endfor; ?> -->
               <!-- <?php //$i=1; ?>
               <a name="" id="" class="btn btn-danger   mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$i?>" role="button">Suivant</a>
               <?php //$i=$i+1; $j=$i-1;  ?>
               <a name="" id="" class="btn btn-danger   mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$j?>" role="button">Precedent</a>
               -->
            </div>
        </div>
        
       
    </div>
    <style>
    .suiv{
       float: right;
    }
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
    <script>

    </script>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
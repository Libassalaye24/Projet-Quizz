
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 

   //require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= WEB_ROUTE.'css/style.css' ?>">
  </head>
  <body>
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
        <div class="row bg-light  p-3 " >
            <div class="col-4 mt-3 " >
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
           <div class="shadow p-4 mb-5  rounded jhg col-md-8 col-sm-12 bg-white mt-4 ">
           <div class="border border-danger   ">
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
                    $suivant=2;
                    $nbrElement = 15;
                   
                  $admin_user=[];
                  foreach ($arrayUser as $user) {
                      if ($user['role']=='ROLE_ADMIN') {
                          $admin_user[]=$user;
                      }
                     
                  }
                

               

                
                
               
                 
                if (!isset($_GET['page'])) {
                   $page=1;
                    $_SESSION['user_admin'] =  $admin_user;
                    $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                    $list_user= get_element_to_display( $_SESSION['user_admin'],$page, $nbrElement);
                  
                }
             
                   if (isset($_GET['page'])) {
                      
                    $page=$_GET['page'];
                    $suivant=$page+1;
                    $precednt=$page-1;
                        if (isset($_SESSION['user_admin'])) {
                            $_SESSION['user_admin'] =  $admin_user;
                            $nbrPage = nombrePageTotal( $_SESSION['user_admin'], $nbrElement);
                            $list_user= get_element_to_display( $_SESSION['user_admin'],$page, $nbrElement);
                          
                        }

                    }
                 
                   
                 
                    

                   
                ?>
                <table class="table p-0 table-bordered">
                    
                    <thead>
                        <tr>
                            <th scope="col">NOM & PRENOM</th>
                            <th class="bouttt" scope="col">LOGIN</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php /* $i=0; */  ?>

                    <?php foreach($list_user as $user ): ?>
                                <tr>
                                    <td style="font-size: larger;"><?php echo $user['name'].'  '.$user['prenom'] ?></td>
                                    <td class="bouttt"><?php echo $user['login'] ?></td>
                                    <td> 
                                        <a name="" id="" class="btn btn-secondary  " href="<?= WEB_ROUTE.'?controlleurs=security&views=edit&id='.$user['id']?>" role="button">modifier <ion-icon name="create-outline"></ion-icon></a>
                                    </td>
                                </tr>
                     <?php endforeach ?>
                    </tbody>
                </table>
                <?php if(empty($_GET['page']) || ($_GET['page']==1) ): ?>
                <a name="" id="" class="btn btn-danger disabled mb-3 mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$precednt;  ?>" role="button">Precedent</a> 
                <?php else: ?>
                    <a name="" id="" class="btn btn-danger  mb-3 mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$precednt;  ?>" role="button">Precedent</a> 
                 <?php endif ?>
                 <?php if($_GET['page'] > $nbrPage-1): ?>
                <a name="" id="" class="btn btn-danger suiv  mb-3 disabled  mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$suivant; ?>" role="button">Suivant</a>
                <?php else: ?>
                    <a name="" id="" class="btn btn-danger suiv mb-3  mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.admin&page='.$suivant; ?>" role="button">Suivant</a>
                 <?php endif ?>
          
            </div>
        </div>
        
       
           </div>
    </div>
    <style>
    .suiv{
       float: right;
       padding: 12px;
    }
           .interface{
               height: 900px;
               padding: 12px;
           }
        
        .jhg{
    padding: 12px;
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
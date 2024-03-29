
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
    <div class="container bg-white conect mt-5">
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
        <div class="row bg-light  p-3 ">
            <div class="col-4 mt-5">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white mt-3 shadow p-3 mb-5 bg-white rounded ">
                <h4 style="padding:4px;text-align:center; " >Liste des joueurs par score</h4>
               <div class="border border-danger  p-3 ">
               <?php
                     // 1 lire le contenu du fichier
                    $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
                    // 2 convertir le json
                    $arrayUser = json_decode($json ,true);

                    $list_user =[];
                    $nbrPage =0;
                    $page=1;
                    $nbrElement = 15;
                    $suivant=2;
                  $joueur_user=[];
                  foreach ($arrayUser as $user) {
                      if ($user['role']=='ROLE_JOUEUR') {
                          $joueur_user[]=$user;
                      }
                     
                  }
                  if (!isset($_GET['page'])) {
                        
                    $_SESSION['joueur_user'] =  $joueur_user;
                    $nbrPage = nombrePageTotal( $_SESSION['joueur_user'], $nbrElement);
                    $list_user= get_element_to_display( $_SESSION['joueur_user'],$page, $nbrElement);
                   
                }
                   if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                    $suivant=$page+1;
                    $precedent=$page-1;
                        if (isset($_SESSION['joueur_user'])) {
                            $_SESSION['joueur_user'] =  $joueur_user;
                            $nbrPage = nombrePageTotal( $_SESSION['joueur_user'], $nbrElement);
                            $list_user= get_element_to_display( $_SESSION['joueur_user'],$page, $nbrElement);
                        }

                    }
                   
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
                        
                           <?php foreach($list_user as $user ): ?>
                             <?php if($user['role'] != 'ROLE_ADMIN'): ?>
                                <tr>
                                    <td style="font-size: larger;"><?php echo $user['name'] ?></td>
                                    <td style="font-size: larger;"><?php echo $user['prenom'] ?></td>
                                    <td style="font-size: larger;"><?php echo $user['score'] ?></td>
                                </tr>
                             <?php endif ?>
                            <?php endforeach ?>
                    </tbody>
                </table>
               
               </div>
              <div class="row">
                  <div class="col-4">
                    <a name="" id="" class="btn btn-danger  mt-2 <?= empty($_GET['page']) || ($_GET['page']==1)? 'disabled' : ""?> " href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.joueur&page='.$precedent;  ?>" role="button">Precedent</a>               
                  </div>
                  <div class="col-4">
                        <?php for($i=1;$i<=$nbrPage;$i++): ?>
                            <a name="" id="" class="btn btn-danger   mt-2" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.joueur&page='.$i?>" role="button"><?=$i?></a>
                         <?php endfor; ?> 
                  </div>
                  <div class="col-4">
                      <a name="" id="" class="btn btn-danger suiv   <?= $_GET['page'] > $nbrPage-1 ? 'disabled' : ""?> mt-2"  href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.joueur&page='.$suivant; ?>" role="button">Suivant</a>
                  </div>
              </div>
             
            </div>
        </div>
        
       
    </div>
    <style>
           .interface{
               height: 900px;
               padding: 12px;
           }
         /*   .container{
            height: 1000px;
        } */
        .suiv{
            float: right;
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
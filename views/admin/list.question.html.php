
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
    <div class="container bg-light conect mt-5 col-xs-12">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-white mt-3 text-center font-weight-bold ml-4"> CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2 ">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row   bg-light  p-md-2 p-sm-4   ">
            <div class="col-4 d-none-sm menul ">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-10 mt-md-4 jjj shadow jeu_quest ml-sm-5 ml-md-0 mb-5 bg-white rounded ">
            <?php
                     // 1 lire le contenu du fichier
                    $js= file_get_contents(ROUTE_DIR.'data/question.json');
                    // 2 convertir le json
                    $arrayQuestion = json_decode($js ,true);
                 //  var_dump(count($arrayQuestion));
                 $page=1;
                 $nbrPage= 0;
                 $suivant=2;
                    $nbrElement=5;
                 if (!isset($_GET['page'])) {
                        
                    $_SESSION['quest'] =  $arrayQuestion;
                    $nbrPage = nombrePageTotal( $_SESSION['quest'], $nbrElement);
                    $quest= get_element_to_display( $_SESSION['quest'],$page, $nbrElement);
                    //$nbr_user= count($list_user);
                   
                }
                   if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                    $suivant=$page+1;
                    $precedent=$page-1;
                        if (isset($_SESSION['quest'])) {
                            $_SESSION['quest'] =  $arrayQuestion;
                            $nbrPage = nombrePageTotal( $_SESSION['quest'], $nbrElement);
                            $quest= get_element_to_display( $_SESSION['quest'],$page, $nbrElement);
                           // $nbr_user= count($list_user);
                        }

                    }
                 
               /*  if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                  $nbrPage=  nombrePageTotal($arrayQuestion,5);
                   $quest= get_element_to_display($arrayQuestion,$page,5);
                } */
                ?>
               <form action="<?=WEB_ROUTE;?>" method="post">
                    <input type="hidden" name="controlleurs" value="admin">
                    <input type="hidden" name="action" value="fixer_question">
                    <div class="row mt-2 col-sm-15 col-md-12 col-xs-10">
                            <div class="col-md-6 col-sm-6 ">
                            <h4>Nbre de jeu par question/jeu</h4>
                            </div>
                            <div class="col-sm-4 col-md-5">
                                <input type="number" class=" form-control col-md-7 col-sm-5 " value="5" name="nbrQuest" id="" >
                            </div>
                        <div class="col-sm-3 col-md-1 mt-1">
                        <button type="submit" class="btn ok ml-auto">OK</button>
                        </div>

                        </div>
               </form>

                <div class="border  border-dark p-3  mt-3">
                <div class=" row    ">
               <table class="table ">
                   
                   <tbody>
                       <?php $i=1; $_SESSION['i']=$i; ?>
                       <?php foreach($quest as $question => $value): ?>
                       
                               <tr>
                                  <td>
                                  
                                      <?= $_SESSION['i']. ".".  $value['question'] ?> 
                                     
                                      <?php if($value['tpquest'] ==  'simple'): ?> <br>
                                        <?php foreach($value['reponse'] as $reps => $vlue): ?>
                                            <div class="row col-md-6 ml-3 mt-2">
                                                <input type="radio" name="coudy">
                                                <div class="col">
                                                    <?= $vlue?>
                                                </div>
                                          </div> 
                                        <?php  endforeach ?>
                                      
                                        <?php elseif($value['tpquest'] == 'text'): ?>
                                            <div class="row col-md-8 col-sm-7 ml-3 mt-2 ">
                                                 <input type="text" name="" class="form-control bg-white">
                                            </div>
                                         <?php elseif($value['tpquest'] == 'multiple'): ?>
                                            <?php foreach($value['reponse'] as $reps => $vlue): ?>
                                                <div class="row col-md-6 ml-3 mt-2">
                                                    <input type="checkbox" name="coudy">
                                                    <div class="col">
                                                    <?= $vlue?>
                                                </div>
                                                 </div> 
                                                 
                                            <?php  endforeach ?>
                                          
                                        <?php endif ?>
                                        <?php $_SESSION['i']++; ?>
                                  </td>
                                  <td>
                                      
                                     <a name="" id="" class="btn btn-light btt " href="<?= WEB_ROUTE.'?controlleurs=admin&views=supprimer&id='.$value['id']?>" role="button"><ion-icon name="trash-outline" class="supp"></ion-icon>delete</a> 
                                     <a name="" id="" class="btn btn-light btt" href="<?= WEB_ROUTE.'?controlleurs=admin&views=modif&id='.$value['id']?>" role="button"><ion-icon name="create-outline" class="edit"></ion-icon>Edit</a>
                                 
                                  </td>
                                  <td>
                                  <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=supprimer&id='.$value['id']?>"> <ion-icon name="trash-outline" class="supp iccc"></ion-icon></a>
                                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=modif&id='.$value['id']?>"> <ion-icon name="create-outline" class="edit iccc"></ion-icon></a>

                                  </td>
                              
                               </tr>
                           <?php endforeach ?>
                   </tbody>
               </table>
               
                   
                   
               </div>
                </div>
                <a name="" id="" class="btn btn-danger  mt-2 <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?>" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.question&page='.$precedent;  ?>" role="button">Precedent</a> 
                 <a name="" id="" class="btn btn-danger suiv  nnn  mt-2 <?=$_GET['page']>$nbrPage-1 ? 'disabled' : ""?>" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.question&page='.$suivant; ?>" role="button">Suivant</a>
              
            </div>
        </div>  
        
       
    </div>
    <style>




        .supp{
            color: red;
        }
        .edit{
            color: yellow;
        }
        .list{
            height: 930px;
        }
        .point{
            width: 15%;
        }
        .interface{
            padding: 12px;
        }
        /* .container{
            height: 1190px;
        } */
        .nnn{
            float: right;
        }
        .ok{
            background-color: #c90017;
            color: white;
        }
        .suivant{
            background-color: #c90017;
            color: white;
            margin-block-end: 12px;
           
        }
        .jhg{
            height: 700px;
        }
        .p-4 {
    padding: 2.5rem !important;
}
        .question{
            width: 360px;
        }
      input{
          margin-left: 4%;
      }
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
    
?>
 <!--  <div class="row col-5 ml-3 mt-2">
                                        <input type="radio" name="coudy">
                                        <div class="col">
                                             
                                        </div>
                                        </div> 
                                        <div class="row col-5 ml-3 mt-2">
                                        <input type="radio" name="coudy">
                                        <div class="col">
                                             
                                        </div>
                                        </div> -->
                                        
 <!--  <div class="row col-5 ml-3 mt-2 ">
                                                <input type="checkbox" name="">
                                                <div class="col">
                                                   
                                                </div>
                                            </div>
                                            <div class="row col-5 ml-3 mt-2 ">
                                                <input type="checkbox" name="">
                                                <div class="col">
                                                   
                                                </div>
                                            </div>
                                          -->
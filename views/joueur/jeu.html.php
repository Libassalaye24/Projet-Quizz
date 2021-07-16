
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
   $fixe_quest =  $_SESSION['fixer_question'];
   
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
        <div class="row nnnn">
        <?php if(est_connect()): ?>
           
            <h4 class="text-white mt-3 text-center font-weight-bold ml-4 "> BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h4>

                <ul class="ml-auto mt-2 ">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-light">
            <div class="col-md-8 bg-light ">
                <div class="row  mx-auto bg-light   "><?php  $questi=0;$questi=$_GET['page']; ?>
                  <p class="text-center text-dark ml-auto mr-auto" style="font-size: 30px;"> Question <?=$questi;?>/<?=$fixe_quest;?> <br></p> 
                </div>
                <?php
                     // 1 lire le contenu du fichier
                    $js= file_get_contents(ROUTE_DIR.'data/question.json');
                    // 2 convertir le json
                    $arrayQuestion = json_decode($js ,true);
                    $js= file_get_contents(ROUTE_DIR.'data/user.data.json');
                    // 2 convertir le json
                    $arrayUser = json_decode($js ,true);
                    $joueur_user=[];
                    foreach ($arrayUser as $user) {
                        if ($user['role']=='ROLE_JOUEUR') {
                            $joueur_user[]=$user;
                        }
                       
                    }
                 $page=1;
                 $nbrPage= 0;
                 $suivant=2;
                    $nbrElement=1;
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
          
                <div class=" bg-white mt-4 border border-danger mb-3    ">
                   
                    <form action="<?=WEB_ROUTE?>" method="post">
                  <input type="hidden" name="controlleurs" value="jeu">
                  <input type="hidden" name="action" value="jeux">
                    <?php  for($i=0;$i<$fixe_quest;$i++):  ?>
                    <div class="mt-4">
                    <h4 class="ml-auto  mr-auto text-center"><?=$quest[$i]['question']?></h4> <br> 
                 
                    </div>
                    
                          
                            <?php if($quest[$i]['tpquest']=='simple'): ?>
                                <?php foreach($quest[$i]['reponse'] as $value): ?>
                                    <div class="form-group mt-4 ml-4 col-md-10">
                                    <input type="radio"
                                    name="reps" id="" aria-describedby="helpId" placeholder="" value="<?=isset($quest[$i]['simple'])?$quest[$i]['simple']:$value;?>">
                                    <label for="" class="h4 ml-4 input col-md-10"><?=$value?></label>
                                 </div>
                                 <?php endforeach ?>
                            <?php elseif($quest[$i]['tpquest']=='multiple'): ?>
                                <?php foreach($quest[$i]['reponse'] as $value): ?>
                                    <div class="form-group mt-4 ml-4 col-md-10">
                                    <input type="checkbox"
                                    name="reps" id="" aria-describedby="helpId" value="<?=isset($quest[$i]['multiple'])?$quest[$i]['multiple']:$value;?>" placeholder="">
                                    <label for="" class="h4 ml-4 input col-md-10"><?=$value?></label>
                                 </div>
                                 <?php endforeach ?>
                            <?php elseif($quest[$i]['tpquest']=='text'): ?>
                                <div class="form-group">
                                  <input type="text"
                                    class="form-control ml-auto mr-auto text" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            <?php endif ?>
             
                    <?php endfor ?>
                    <div class="row ">
                 <?php if(empty($_GET['page']) || ($_GET['page']==1) ): ?>
                <a name="" id="" class="btn btn-danger disabled ml-4 mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$precedent;  ?>" role="button">Precedent</a> 
                <?php else: ?>
                    <a name="" id="" class="btn btn-danger ml-4 mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$precedent;  ?>" role="button">Precedent</a> 
                 <?php endif ?>
                 <?php if($_GET['page'] > $fixe_quest-1): ?>
                <a name="" id="" class="btn btn-danger suiv disabled nnn  mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$suivant; ?>" role="button">Suivant</a>
                <?php else: ?>
<!--                     <a name="" id="" class="btn btn-danger suiv   nnn  mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$suivant; ?>" role="button">Suivant</a>
 -->   
                 <a href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$suivant; ?>" class="btn btn-danger  suiv   nnn  mt-2" role="submit">Suivant</a>
                 <?php endif ?>
                 </div>

                    </form>

                
                </div>
            </div>
            
            <div class="col-md-4 bg-light p-4  shadow h-75 mt-4">
               <div class="row">
               <div class="col-6 ">
                  <a name="" id="" class="btn btn-danger" href="#" role="button">  Meilleures scores </a>
                </div>
                <div class="col-6">
                <a name="" id="" class="btn btn-light" href="#" role="button">   Mon meilleur score </a>
                 </div>
                 <?php for ($j=$i+1; $j <count($joueur_user) ; $j++): ?>
                 <?php for($i=0;$i<(count($joueur_user)-1);$i++): ?>
                  
                        <?php  if ($joueur_user[$i]['score'] >= $joueur_user[$j]['score']): ?>
                            <?php  $tmp=$joueur_user[$i]; ?>
                            <?php  $joueur_user[$i] = $joueur_user[$j]; ?>
                            <?php   $joueur_user[$j] = $tmp;  ?>
                         <?php endif ?>
                    <?php endfor ?>
                    <?php endfor ?>
                          
                
                  <table class="table">
                      <thead>
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>score</th>
                      </thead>
                      <tbody>
                            <?php  for ($i=0; $i <5 ; $i++): ?>
                                <tr>
                                    <td><?= $joueur_user[$i]['prenom']?></td>
                                    <td><?= $joueur_user[$i]['name']?></td>
                                    <td><?= $joueur_user[$i]['score']?></td>
                                </tr>
                            <?php endfor ?>
                      </tbody>
                  </table>
               </div>
                   
             </div>
        </div>
       
        
       
    </div>
    <style>
    .input{
        width: 30px;
        height: 30px;
    }
    .text{
        width: 60%;
    }
    .nbrs{
        float: right;
        margin-right: 4%;
    }
    .nnnn{
        background-color: #c90017;
    }
    .suiv{
        margin-left: 68%;
    }
    .btn{
       margin-block-end: 10px;
    }
    </style>
    
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
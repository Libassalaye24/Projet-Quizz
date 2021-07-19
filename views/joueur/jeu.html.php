
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
  // $fixe_quest =  $_SESSION['fixer_question'];
   ( empty($_SESSION['fixer_question'])?$fixe_quest=5:$fixe_quest=$_SESSION['fixer_question']);
  //var_dump(  $_SESSION['repsJeu']);
 // var_dump( $_SESSION['repr']);
   //die();
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
      <div class="container">
      <div class="row  nnnn mt-5">
       
      <?php   require_once(ROUTE_DIR.'views/imc/menu2.html.php');  ?>
          
        </div>
          <div class="row bg-light">
            <div class="col-md-8 col-sm-12">
              <div class="row  mx-auto bg-light   "><?php  $questi=1;/* $questi=$_GET['page']+1; */ $questi = ($_GET['page']==1 || empty($_GET['page'])) ? $questi=1: $questi=$_GET['page'] ; ?>
                  <p class="text-center text-dark  ml-auto mr-auto" style="font-size: 30px;"> Question <?=$questi;?>/<?=$fixe_quest;?> <br></p> 
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
                   
                }
                   if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                    $suivant=$page+1;
                    $precedent=$page-1;
                    $_SESSION['suivant']=$suivant;
                        if (isset($_SESSION['quest'])) {
                            $_SESSION['quest'] =  $arrayQuestion;
                            $nbrPage = nombrePageTotal( $_SESSION['quest'], $nbrElement);
                            $quest= get_element_to_display( $_SESSION['quest'],$page, $nbrElement);
                          
                        }

                    }
                 
             
                ?>
          
                <div class=" bg-white mt-4 border border-danger mb-3    ">
                   
                    <form action="<?=WEB_ROUTE?>" method="post">
                  <input type="hidden" name="controlleurs" value="joueur">
                  <input type="hidden" name="action" value="jeux">
                    <?php  for($i=0;$i<$fixe_quest;$i++):  ?>
                    <div class="mt-4">
                    <h4 class="ml-auto font-weight-bold text-justify  mr-auto text-center"><?=$quest[$i]['question']?></h4>
                    </div>
                            <?php if($quest[$i]['tpquest']=='simple'): ?>
                                <?php foreach($quest[$i]['reponse'] as $value): ?>
                                    <div class="form-group mt-4 ml-4 col-md-10">
                                    <input type="radio"
                                    name="repr" id="" aria-describedby="helpId" placeholder="" value="<?=isset($quest[$i]['simple'])?$value:"";?>">
                                    <label for="" class="h4 ml-4 input col-md-10"><?=$value?></label>
                                    <?php  $_SESSION['questJeu']=$quest[$i]['question'];
                                            
                                                $_SESSION['repr']=$quest[$i]['reponse'];
                                            
                                     ?>
                                 </div>
                                 <?php endforeach ?>
                            <?php elseif($quest[$i]['tpquest']=='multiple'): ?>
                                <?php foreach($quest[$i]['reponse'] as $value): ?>
                                    <div class="form-group mt-4 ml-4 col-md-10">
                                    <input type="checkbox"
                                    name="reps" id="" aria-describedby="helpId" value="<?= "checked" ? $value:"";?>" placeholder="">
                                    <label for="" class="h4 ml-4 input font-family-arial   col-md-10"><?=$value?></label>
                                 </div>
                                 <?php endforeach ?>
                            <?php elseif($quest[$i]['tpquest']=='text'): ?>
                                <div class="form-group">
                                  <input type="text"
                                    class="form-control ml-auto mr-auto text" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            <?php endif ?>
             
                    <?php endfor ?>
                    </div>
                    <div class="row bg-dark ">
                <a name="" id="" class="btn btn-danger   <?= empty($_GET['page']) || ($_GET['page']==1) ? 'disabled' : ""?> ml-4 mb-3  mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$precedent;  ?>" role="button">Precedent</a> 
               
                 <?php if($_GET['page'] > $fixe_quest-1 ): ?>
                    <button type="submit" name="suivant" id="" class="btn btn-danger  ml-auto mr-4 mb-3  nnn  mt-2">Valider</button>
                <?php else: ?>
                    <a name="" id="" class="btn btn-danger    ml-auto mr-4 mb-3   nnn  mt-2" href="<?=WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$suivant; ?>" role="button">Suivant</a>
                 <?php endif ?>
                 </div>
                    </form>
        
                
              
            </div>
            
              <div class="col-md-4 joueur ">
              <div class="row shadow mt-4">
                    <h5 class="shadow ml-auto mr-auto mt-2 mb-white p-2 bg-danger text-white">les 5 meilleures scores</h5>
                    <?php for ($j=$i+1; $j <count($joueur_user) ; $j++): ?>
                    <?php for($i=0;$i<(count($joueur_user)-1);$i++): ?>
               
                 
                  
                        <?php  if ($joueur_user[$i]['score'] >= $joueur_user[$j]['score']): ?>
                            <?php  $tmp=$joueur_user[$i]; ?>
                            <?php  $joueur_user[$i] = $joueur_user[$j]; ?>
                            <?php   $joueur_user[$j] = $tmp;  ?>
                         <?php endif ?>
                    <?php endfor ?>
                    <?php endfor ?>
                          
                
                  <table class="table mr-sm-3">
                      <thead>
                          <th>Prenom&Nom</th>
                          <th>score</th>
                      </thead>
                      <tbody>
                            <?php  for ($i=0; $i <5 ; $i++): ?>
                                <tr>
                                    <td><?= $joueur_user[$i]['prenom']." ". $joueur_user[$i]['name']?></td>
                                    <td><?= $joueur_user[$i]['score'] ?></td>
                                </tr>
                            <?php endfor ?>
                      </tbody>
                  </table>
               </div>
              </div>
          </div>
      </div>
      <?php
     // var_dump($_SESSION['questJeu']);
     // var_dump($_SESSION['repr']);
      /*   if (isset( $_SESSION['suivant'])) {
            unset( $_SESSION['suivant']);
        } */
       ?>
      <style>
          .input{
              margin-top: -6%;
          }
          body {
  margin: 0;
  font-family: Helvetica, sans-serif;
  background-color: #f4f4f4;
}
body{
    overflow-x: hidden;
}
.nnnn{
    background-color: #c90017;
}
li{
    list-style: none;
}
       
      </style>
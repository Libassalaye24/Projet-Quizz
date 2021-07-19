
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
  // $fixe_quest =  $_SESSION['fixer_question'];
   ( empty($_SESSION['fixer_question'])?$fixe_quest=5:$fixe_quest=$_SESSION['fixer_question']);
  //var_dump(  $_SESSION['repsJeu']);
   
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
      <div class="row  nnnn mt-2">
       
       <?php   require_once(ROUTE_DIR.'views/imc/menu2.html.php');  ?>
           
         </div>
         <div class="row shadow mt-4 bg-white ">
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
             ?>
         <h5 class="align-center text-danger ml-auto mr-auto shadow mb-2 mt-2">les meilleures scores</h5>
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
     <style>
          .input{
              margin-top: -6%;
          }
          body {
  margin: 0;
  font-family: Helvetica, sans-serif;
  background-color: #f4f4f4;
}
.nnnn{
    background-color: #c90017;
}
li{
    list-style: none;
}
       
      </style>
       
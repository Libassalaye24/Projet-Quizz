
<?php 
    require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
   
?>
    <div class="container bg-light conect mt-5 col-xs-12">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 text-center font-weight-bold ml-4"> CREER ET PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2 ">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row   bg-white interface jhg ">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-10 bg-white ">
            <?php
                     // 1 lire le contenu du fichier
                    $js= file_get_contents(ROUTE_DIR.'data/question.json');
                    // 2 convertir le json
                    $arrayQuestion = json_decode($js ,true);
                 //  var_dump(count($arrayQuestion));
                if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                    nombrePageTotal($arrayQuestion,5);
                    get_element_to_display($arrayQuestion,$page,5);
                }
                ?>
                <div class="row">
                    <div class="col-6 ">
                    <h4>Nbre de jeu par question/jeu</h4>
                    </div>
                    <div class="col-md-5 col-sm-9 col-xs-12 ">
                          <input type="number" class=" point" name="" id="" placeholder="5">
                    </div>
                   <div class="">
                   <button type="submit" class="btn ok ml-auto">OK</button>
                   </div>

                </div>
               <div class=" row border border-danger list mt-3 ">
               <table class="table ">
                   
                   <tbody>
                       <?php $i=1; ?>
                       <?php foreach($arrayQuestion as $question ): ?>
                       
                               <tr>
                                   <td>
                                   <?php if($i<=5): ?>
                                      <b> <?php echo "$i.".$question['question'] ?> </b>
                                     <a name="" id="" class="btn btn-light" href="#" role="button"><ion-icon name="trash-outline" class="supp"></ion-icon>delete</a> <a name="" id="" class="btn btn-light" href="#" role="button"><ion-icon name="create-outline" class="edit"></ion-icon>Edit</a>
                                       <br>
                                       <?php $i=$i+1; ?> 
                                      
                                   <?php if($question['tpquest'] ==  'simpe'): ?>
                                       <input type="radio" name="1" id="" class="mt-2">
                                       <?php echo $question['reponse'] ?>
                                       <br>
                                       <input type="radio" name="1" id="" class="mt-2">
                                       <?php echo $question['reponse0'] ?>
                                   <?php elseif($question['tpquest'] == 'text'): ?>
                                    <div class="form-group mt-3">
                                    <input type="text" name="question" class="mt-2 input-lg" id="" class="form-control bg-white  question" placeholder="" >

                                    </div>
                                   <?php elseif($question['tpquest'] == 'multiple'): ?>
                                    <div class="checkbox ml-4">
                                        <label for="">  <input class="form-check-input " name="reps" type="checkbox" value="1" > <?php echo $question['reponse'] ?></label>
                                       
                                        <br>
                                         <label for="">  <input class="form-check-input " name="reps" type="checkbox" value="1" > <?php echo $question['reponse0'] ?></label>
                                        <br>
                                        <label for="">  <input class="form-check-input " name="reps" type="checkbox" value="1" > <?php echo $question['reponse1'] ?></label>
                                        </label>
                                    </div>
                                      
                                   <?php endif ?>
                                  
                                    
                                 
                                    </td>
                                    <?php endif ?>
                                 
                               </tr>
                           <?php endforeach ?>
                   </tbody>
               </table>
               
                   
                   
               </div>
               <?php $i=1; ?>
               <a name="" id="" class="btn suivant mt-4  mr-5  col-xs-2 " href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question?page='.$i ?>" role="button">SUIVANT</a>
               <?php $i=$i+1; ?>
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
        .container{
            height: 1190px;
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
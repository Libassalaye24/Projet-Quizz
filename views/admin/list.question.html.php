
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
        <div class="row   bg-white   ">
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
                 $page=1;
                 $nbrPage= 0;
                 
                if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                  $nbrPage=  nombrePageTotal($arrayQuestion,5);
                   $quest= get_element_to_display($arrayQuestion,$page,5);
                }
                ?>
                <div class="row mt-2 col-sm-12 col-md-12 col-xs-10">
                    <div class="col-md-6 col-sm-6 ">
                    <h4>Nbre de jeu par question/jeu</h4>
                    </div>
                    <div class="col-sm-6 col-md-5">
                          <input type="number" class="  col-md-7 col-sm-5 " name="" id="" placeholder="5">
                    </div>
                   <div class="col-sm-3 col-md-1 mt-1">
                   <button type="submit" class="btn ok ml-auto">OK</button>
                   </div>

                </div>
               <div class=" row border border-danger mli mt-3 ">
               <table class="table ">
                   
                   <tbody>
                       <?php $i=1; ?>
                       <?php foreach($arrayQuestion as $question => $value): ?>
                       
                               <tr>
                                  <td>
                                  
                                      <?= "$i.".$value['question'] ?> <br>
                                     
                                      <?php if($value['tpquest'] ==  'simpe'): ?> <br>
                                        <div class="row col-5 ml-3 mt-2">
                                        <input type="radio" name="coudy">
                                        <div class="col">
                                             <?= $value['reponse']?>
                                        </div>
                                        </div> 
                                        <div class="row col-5 ml-3 mt-2">
                                        <input type="radio" name="coudy">
                                        <div class="col">
                                             <?= $value['reponse0']?>
                                        </div>
                                        </div>
                                        
                                        <?php elseif($value['tpquest'] == 'text'): ?>
                                            <div class="row col-5 ml-3 mt-2 ">
                                                 <input type="text" name="" class="form-control bg-white">
                                            </div>
                                         <?php elseif($value['tpquest'] == 'multiple'): ?>
                                            <div class="row col-5 ml-3 mt-2 ">
                                                <input type="checkbox" name="">
                                                <div class="col">
                                                     <?= $value['reponse'] ?>
                                                </div>
                                            </div>
                                            <div class="row col-5 ml-3 mt-2 ">
                                                <input type="checkbox" name="">
                                                <div class="col">
                                                     <?= $value['reponse0'] ?>
                                                </div>
                                            </div>
                                         
                                        <?php endif ?>
                                        <?php $i=$i+1; ?>
                                  </td>
                                  <td>
                                     <a name="" id="" class="btn btn-light" href="<?= WEB_ROUTE.'?controlleurs=admin&views=supprimer&id='.$value['id']?>" role="button"><ion-icon name="trash-outline" class="supp"></ion-icon>delete</a> 
                                     <a name="" id="" class="btn btn-light" href="<?= WEB_ROUTE.'?controlleurs=admin&views=modif&id='.$value['id']?>" role="button"><ion-icon name="create-outline" class="edit"></ion-icon>Edit</a>
                                   
                                  </td>
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
        /* .container{
            height: 1190px;
        } */
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
        .mli{
            padding: 12px;
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
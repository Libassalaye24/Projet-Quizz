
<?php 

if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
  $success_Question = '';
  $ques=$_SESSION['question'];
  $pts=  $_SESSION['nbr_reps'];
  $tpques=$_SESSION['tpquest'];
  $tpreps=$_SESSION['tpquest']; 
  $reps=$_SESSION['tab_reponse'] ;
  
  /* var_dump($reps);
  die(); */

        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
  

?>
    <div class="container bg-light conect mt-5">
        <div class="row  deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-white mt-3 ml-4 font-weight-bold ">PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-light  ">
            <div class="col-4 mt-2">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white mt-4 mb-4 shadow  mb-5 bg-white rounded  pl-2  jhg">
                <h3 style="color: #c90017;">
                  CREER ET PARAMETRER VOS QUIZZ
                </h3>
             <form action="<?= WEB_ROUTE ?>" method="post">
             <input type="hidden" name="controlleurs" value="admin">
             <input type="hidden" name="action" value="<?=!isset($quest['id']) ? 'question': 'modif' ?>">
             <input type="hidden" name="id" value="<?=isset($quest['id']) ? $quest['id'] : ""; ?>">
             <?php if(isset($_SESSION['sucess_Question'])){
                   $success_Question=$_SESSION['sucess_Question'];                   
               }

                ?>
                <?php if(isset($_SESSION['sucess_Question'])): ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?=$success_Question?></h4>
                     </div>
                <?php endif ?>
               <div class="border border-danger  mt-3   ">
                    <div class="row col-md-10 col-sm-8 col-xs-5">
                        <div class="col-md-10 col-sm-8   ">
                             <label for="" class="ml-4">Questions</label>
                        </div>
                        <div class="form-group question ml-4  col-md-9 col-sm-10 col-xs-5">
                            <textarea name="question" class="form-control bg-white" id="" cols="45" rows="2"><?=isset($quest['question']) ? $quest['question']: '' ?><?=isset($ques) ? $ques: ""; ?></textarea>
                            <small class="text-danger"><?=isset($arrayError['question']) ? $arrayError['question'] : ""; ?></small>
                        </div>
                    </div>
                  <div class="row col-md-10 col-sm-9 col-xs-5">
                      <div class="col-md-4 col-sm-8 col-xs-2">
                      <div class="form-group ml-4">
                     <label for="">Nbre de points</label>
                     <input type="number" name="nbr_pts" id="" class="form-control  bg-white ml-4" placeholder="" aria-describedby="helpId" value="<?=isset($quest['nbr_pts']) ? $quest['nbr_pts']: '' ?><?=isset( $_SESSION['pts'])?  $_SESSION['pts'] : '' ?>">
                     <small class="text-danger"><?=isset($arrayError['nbr_pts']) ? $arrayError['nbr_pts'] : ""; ?></small>
                    </div>
                      </div>
                  </div>
                    <div class="row ">
                        <div class="col-7">
                        <label for="" class="ml-2">Types de reponses</label>
                        </div>
                            <div class="form-group ml-5 question col-md-6 col-sm-8 col-xs-4 ">
                                <select class="custom-select " name="tpquest"  id="" >
                                    <option><?=isset($quest['tpquest']) ? $quest['tpquest']: '' ?><?=isset($tpreps) ? $tpreps:""; ?></option>
                                    <option value="text">Texte</option>
                                    <option value="simple">Simple</option>
                                    <option value="multiple">Multiple choice</option>
                                
                                </select>
                                <small id="helpId" class=" text-danger form-text"><?=isset($arrayError['tpquest']) ? $arrayError['tpquest'] : ""; ?></small>

                            </div>
                
                     </div>
                     <?php   $nbrreps=$_SESSION['nbr_reps']; ?>
                     <div class="row ">
                        <div class="col-7">
                        <label for="" class="ml-4">Nbr de reponse</label>
                        <div class="form-group ml-5">
                          <input type="number" class="form-control bg-white" name="nbr_reps" value="<?=isset($quest['nbr_reps']) ? $quest['nbr_reps']: '' ?><?=isset($pts) ? $pts: ""; ?>" id="" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-danger"><?=isset($arrayError['nbr_reps']) ? $arrayError['nbr_reps'] : ""; ?></small>
                        </div>
                        </div>
                        <div class="col-4 mt-4">
                              <button type="submit" class="btn btn-danger"   name="<?=isset($quest['id']) ? "Modif_quest" : "nbr_submit_question"; ?>">+</button>
                        </div>
                        </div>

                        <?php  $pts=$_SESSION['nbr_reps']; ?>
                        <?php for($i=1;$i<=$pts;$i++): ?>
                            <div class="form-group ml-4">
                                               <label for="">Reponse<?=$i?> </label>
                                               <div class="row">
                                                   <div class="col-6 ml-4">
                                                       <input type="text" name="reponse<?=$i?>" id="" class="form-control bg-white " placeholder="" aria-describedby="helpId" value="">
                                                       <small class="text-danger"> <?=isset($arrayError['reponse']) ? $arrayError['reponse'] : ""; ?></small>
                                                   </div>
                                                   <div class="col-4">
                                                        <?php if(isset($tpreps)): ?>
                                                        <?php if($tpreps == 'simple'): ?>
                                                            <input type="radio" name="bon_repsr" value=""  class=" mt-2 " id="">
                                                       <?php elseif($tpreps == 'multiple') :?>
                                                        <input type="checkbox" class="form-check-input " name="bon_reps " id="" value="bon_reps<?=$i?>" >
                                                       <?php endif ?>
                                                       <?php endif ?>
                                                   </div>
                                               </div>
                                          </div>
                        <?php endfor ?>
                        <div class="form-group ml-4">
                                             
                                               <div class="row">
                                               <?php if(isset($quest['id'])): ?>
                                                 <?php for($i=0;$i<count($tab_reponse);$i++): ?>
                                                   
                                                   <div class="col-6 ml-4">
                                                   <label for="">Reponse<?=$i?> </label>
                                                       <input type="text" name="reponse<?=$i?>" id="" class="form-control bg-white " placeholder="" aria-describedby="helpId" value="<?=isset($tab_reponse[$i])? $tab_reponse[$i]: "" ?>">
                                                       <small class="text-danger"> <?=isset($arrayError['reponse']) ? $arrayError['reponse'] : ""; ?></small>
                                                   </div>
                                                   <?php if(isset($quest['tpquest'])): ?>
                                                        <?php if($quest['tpquest'] == 'simple'): ?>
                                                            <input type="radio" name="bon_repsr"  class="<?=isset($quest['bon_repsr']) && $quest['bon_repsr']== 'reponse'.$i ? 'checked' : ""  ?>  kli" id="">
                                                       <?php elseif($quest['tpquest'] == 'multiple') :?>
                                                            <input type="checkbox" class="kli " name="bon_reps " id="" value="bon_reps<?=$i?>" >
                                                       <?php endif ?>
                                                       <?php endif ?>
                                                   <?php endfor ?>
                                                  
                                                     
                                                       <?php endif ?>
                                                   </div>
                                               </div>
                                          </div>
                </div>
                <div class="row ml-auto">
                    <button type="submit" name="btn_submit" class="border border-danger button ml-auto mr-4 mt-2 p-10"><?=isset($quest['id']) ? "Modifier" : "Confirmer"; ?></button>
                </div>
             </form>
              
            </div>
        </div>
        
       
    </div>
    <style>
        .kli{
            margin-top: 5%;
        }
        .button{
            padding: 15px 32px;
            
            background-color: #c90017;
            border: #c90017;
            color: white;
        }
        .button:hover{
            background-color: #fff;
            color: #c90017;
            transition-property: all 0,6s;
            border-color: 2px solid #c90017;
        }
         .slc{
            width: 90px;
        }
        
        .question{
            width: 390px;
        }
        .checks{
            width: 70px;
            height: 30px;
            margin-right: 19%;
        }
       /*  .interface{
            padding: 12px;
            height: 600px;
        } */
       /*  .container{
            height: 900px;
        } */
        .bordure{
            height: 500px;
            
        }
      
        .plus{
            margin-left: 62%;
            margin-top: -8%;
        }
        .point{
            width: 15%;
        }
       
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
    if (isset($_SESSION['sucess_Question'])) {
        unset($_SESSION['sucess_Question']);
    }
    if (isset($_SESSION['nbr_reps'])) {
        unset($_SESSION['nbr_reps']);
    }
    if (isset($_SESSION['pts'])) {
        unset($_SESSION['pts']);
    }
    if (isset($_SESSION['question'])) {
        unset($_SESSION['question']);
    }
    if (isset($_SESSION['tpquest'])) {
        unset($_SESSION['tpquest']);
    }
    if (isset($_SESSION['tab_reponse'])) {
        unset($_SESSION['tab_reponse']);
    }
    
    

?>

<?php 

if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
  $success_Question = '';
 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
  

?>
    <div class="container bg-white conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold ">PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link text-dark" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white interface ">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-white jhg">
                <h3 style="color: #c90017;">
                  CREER ET PARAMETRER VOS QUIZZ
                </h3>
             <form action="<?= WEB_ROUTE ?>" method="post">
             <input type="hidden" name="controlleurs" value="admin">
             <input type="hidden" name="action" value="question">
             <?php if(isset($_SESSION['sucess_Question'])){
                   $success_Question=$_SESSION['sucess_Question'];                   
               }

                ?>
                <?php if(isset($_SESSION['sucess_Question'])): ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><?=$success_Question?></h4>
                     </div>
                <?php endif ?>
               <div class="border border-danger bordure mt-3">
                <label for="" class="ml-4">Questions</label>
                    <div class="form-group question ml-4 col-sm-9">
                   
                    <input type="text" name="question" id="" class="form-control bg-white" placeholder="" aria-describedby="helpId">
                    <small class="text-danger"><?=isset($arrayError['question']) ? $arrayError['question'] : ""; ?></small>
                </div>
                   <div class="form-group ml-4">
                     <label for="">Nbre de points</label>
                     <input type="number" name="nbr_pts" id="" class="form-control point bg-white ml-4" placeholder="" aria-describedby="helpId">
                     <p class="text-danger"><?=isset($arrayError['nbr_pts']) ? $arrayError['nbr_pts'] : ""; ?></p>
                    </div>
                    <label for="" class="ml-4">Types de reponses</label>
                    <div class="form-group ml-5 question ">
                    
                        <select class="custom-select " name="tpquest" id="">
                            <option value="text">Texte</option>
                            <option value="simpe">Simple</option>
                            <option value="multiple">Multiple choice</option>
                           
                        </select>
                    </div>
                    <small class="text-danger"><?=isset($arrayError['tpquest']) ? $arrayError['tpquest'] : ""; ?></small>

                    <a name="ajout" id="" class="btn btn-danger plus" href="<?=WEB_ROUTE.'?controlleurs=admin&views=ajouter'?>" role="button">+</a>


                   <div class="form-group ml-4">
                     <label for="">Reponse 1</label>
                     <div class="row">
                         <div class="col-6 ml-4">
                         <input type="text" name="reponse" id="" class="form-control bg-white " placeholder="" aria-describedby="helpId">
                         <small class="text-danger"> <?=isset($arrayError['reponse']) ? $arrayError['reponse'] : ""; ?></small>
                        </div>
                         <div class="col-4">
                            <input type="checkbox" class="form-check-input checks" name="" id="" value="checkedValue" >
                            <input type="radio" name="" class="ml-5 mt-2" id="">
                         </div>
                     </div>
                   </div>
                   <button type="submit" name="btn_submit" class="border border-danger button">Enregistrer</button>
                </div>
             </form>
              
            </div>
        </div>
        
       
    </div>
    <style>
        .button{
            padding: 15px 32px;
            float: right;
            margin-right: 4%;
            background-color: #c90017;
            border: #c90017;
            color: white;
            margin-top: 10%;
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
        .container{
            height: 700px;
        }
        .question{
            width: 360px;
        }
        .checks{
            width: 70px;
            height: 30px;
            margin-right: 19%;
        }
        .interface{
            padding: 12px;
            height: 600px;
        }
       /*  .container{
            height: 700px;
        } */
        .bordure{
            height: 490px;
            
        }
        .jhg{
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
?>
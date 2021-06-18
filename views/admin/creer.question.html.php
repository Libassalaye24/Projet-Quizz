
<?php 
        require_once(ROUTE_DIR.'views/imc/entete.html.php'); 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
    <div class="container bg-light conect mt-5">
        <div class="row deconnect">
        <?php if(est_connect()): ?>
            <h3 class="text-dark mt-3 ml-4 font-weight-bold ">PARAMETRER VOS QUIZZ</h3>

                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>
        </div>
        <div class="row bg-white interface ">
            <div class="col-4">
                <?php   require_once(ROUTE_DIR.'views/imc/menu.html.php');  ?>
            </div>
            <div class="col-md-8 col-sm-12 bg-light jhg">
                <h3 style="color: #c90017;">
                    PARAMETRER VOS QUIZZ
                </h3>
               <form action="" method="post">
               <div class="border border-danger bordure mt-3">
                <label for="" class="ml-4">Questions</label>
                    <div class="form-group question ml-4 col-sm-9">
                   
                    <input type="text" name="" id="" class="form-control bg-white" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    </div>
                   <div class="form-group ml-4">
                     <label for="">Nbre de points</label>
                     <input type="number" name="nbr-pts" id="" class="form-control point bg-white ml-4" placeholder="" aria-describedby="helpId">
                   </div>
                    <label for="" class="ml-4">Types de reponses</label>
                    <div class="form-group ml-5 question ">
                    
                        <select class="custom-select " name="tpquest" id="">
                            <option selected>Type de reponse</option>
                            <option value="text">Texte</option>
                            <option value="simpe">Simple</option>
                            <option value="multiple">Multiple choice</option>
                           
                        </select>
                        <button type="submit" name="ajout" class="plus ">+</button>
                    </div>

                   <div class="form-group ml-4">
                     <label for="">Reponse 1</label>
                     <div class="row">
                         <div class="col-6 ml-4">
                         <input type="text" name="" id="" class="form-control bg-white " placeholder="" aria-describedby="helpId">
                           
                         </div>
                         <div class="col-4">
                         <input type="checkbox" class="form-check-input checks" name="" id="" value="checkedValue" >
                         <input type="radio" name="" class="ml-5 mt-2" id="">

                         </div>
                     </div>
                   </div>
                   
                </div>
               </form>
              
            </div>
        </div>
        
       
    </div>
    <style>
         .slc{
            width: 90px;
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
        }
       /*  .container{
            height: 700px;
        } */
        .bordure{
            height: 400px;
        }
        .jhg{
            height: 500px;
        }
        .plus{
            margin-left: 102%;
            margin-top: -12%;
        }
        .point{
            width: 15%;
        }
       
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
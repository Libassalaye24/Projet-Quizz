
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
               <div class="border border-danger mt-3">
                <label for="" class="ml-4">Questions</label>
                    <div class="form-group question ml-5">
                   
                    <input type="text" name="" id="" class="form-control bg-light" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                    </div>
                    <label for="" class="ml-4">Nbre de points</label>
                    <div class="form-group ml-5 slc">
                    
                        <select class="custom-select" name="" id="">
                            <option selected>selectionner</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                            <option value="">6</option>
                            <option value="">6</option>
                            <option value="">6</option>
                        </select>
                    </div>
                    <label for="" class="ml-4">Types de reponses</label>
                    <div class="form-group ml-5 question ">
                    
                        <select class="custom-select" name="tpquest" id="">
                            <option selected>Type de reponse</option>
                            <option value="text">Texte</option>
                            <option value="simpe">Simple</option>
                            <option value="multiple">Multiple choice</option>
                           
                        </select>
                        <a href="#" class="btn btn-dark active ml-4" role="button">+</a>
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
        .interface{
            padding: 12px;
        }
       /*  .container{
            height: 700px;
        } */
        .jhg{
            height: 500px;
        }
    </style>
<?php 
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
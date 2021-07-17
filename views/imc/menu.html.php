<?php 
   require_once(ROUTE_DIR.'views/imc/header.html.php'); 
?>
        <?php if(est_joueur()): ?>
<!--      <img src="<?php echo UPLOAD_DIR . basename($_FILES['file1']['name']) ; ?>" alt=""> 
 -->       
          <?php endif ?>
       

   
    <?php if(est_admin()): ?>
      

  <div class="row ">
  <button  class="btn btn-danger toggle    mb-3    " data-toggle="modal"  data-target="#exampleModal">&#9776;</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-white bg-dark" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Menu </h5>
        <button type="button" class="close bg-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
       <div class="row">
         <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question'?>">Liste des questions</a>
       </div>
       <div class="row">
       <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.admin'?>">Creer Admin</a>
       </div>
       <div class="row">
                       <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.question'?>">Creer Questions</a>

       </div>
       <div class="row">
                 <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.joueur'?>">Liste des joueurs</a>
           </div>
           <div class="row">
              <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.admin '?>">Liste des Admins</a>
             </div>
               <div class="row">
                 <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=admin&views=tab.bord '?>">Tableau de bord</a>
                </div>
                   <div class="row">   
                             <a onclick="closeNav()" class="text-white" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion '?>">Se deconnecter</a>
                    </div>
        
       
      </div>
      
    </div>
  </div>
</div>


   
    <div class="mnn  shadow  mb-5  ">
            <div class=" photo rounded-top ">
                
                <h3 class="ml-2 text-white">Libasse</h3>
                <h3 class="ml-2 text-white">Mbaye</h3>
<!--                 <img src="<?php //echo UPLOAD_DIR . basename($_FILES['file1']['name']) ; ?>" alt="">
 -->            </div>
            <div class="vertical-menu  " >
                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question'?>" class="active">Liste des questions</a>
                    <img class="mt-3 ml-auto mr-4" src="<?= WEB_ROUTE.'img/ic-liste-active.png' ?>" alt="">
                </div>
                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.admin'?>">Creer admin</a>
                    
                    <img class="mt-3 ml-auto mr-4" src="<?= WEB_ROUTE.'img/ic-ajout.png' ?>" alt="">
                </div>  
                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.joueur'?>" >Liste des joueurs</a>
                    <img class="mt-3 ml-auto mr-4" src="<?= WEB_ROUTE.'img/ic-liste.png' ?>" alt="">
                </div>
                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.question'?>" >Creer questions</a>
                    <img class="mt-3 ml-auto mr-4" src="<?= WEB_ROUTE.'img/ic-ajout-active.png' ?>" alt="">
                </div>

                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.admin'?>" >Liste des admins</a>
                    <img class="mt-3 ml-auto mr-4"  src="<?= WEB_ROUTE.'img/ic-liste-active.png' ?>" alt="">
                </div>

                <div class="d-flex">
                    <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=tab.bord'?>" >Tableau de bord</a>
                    <ion-icon class="mt-3 ml-auto mr-4" name="stats-chart-outline"></ion-icon>
                  <!--   <img class="mt-3 ml-auto mr-4"  src="<?= WEB_ROUTE.'img/ic-liste-active.png' ?>" alt=""> -->
                </div>
              
          
            </div>
            
        
    </div>
    
    <?php elseif(est_joueur()): ?>

      
    <?php endif ?>
    <style>
        .d-flex{
            cursor: pointer;
        }
       
    </style>
    
    <?php 
   require_once(ROUTE_DIR.'views/imc/footer.html.php'); 
?>

               
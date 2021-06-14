<?php 
   require_once(ROUTE_DIR.'views/imc/header.html.php');
?>  
<div class="container col-sm-12   col-10 col-md-9 col-lg-12 mt-2 xl-auto col-xs-9     ">
    
            <div class="card ">
                  <div class="card-body  ">
                  <nav class="navbar navbar-expand-sm navbar-light  ">
  
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                
                                <?php if(est_joueur()): ?>
                                   <img src="<?php echo UPLOAD_DIR. basename($_FILES['file1']['tmp_name']); ?>" alt=""> 
                            <b><p style="font-size: 1.2em;font-family: work sans;">BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</p></b> 
                                <?php endif ?>
                            
                            </ul>
                            <ul class="navbar-nav mt-2 mt-lg-0">
                                
                                <?php if(est_admin()): ?>
                                    <b>  <p style="font-size: 1.2em;font-family: work sans;">CREER ET PARAMETRER VOS QUIZZ</p></b> 
                                <?php endif ?>
                            
                            </ul>
                            
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                
                                <?php if(est_connect()): ?>
                                <li class="nav-item ">
                                    <a  class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion'?>">Deconnexiion</a>
                                </li>
                                <?php endif ?>
                            
                            </ul>
                          
                            
                        
                        </div>
                    </nav>
                    <?php if(est_admin()): ?>
                        <div class=" avatar">
                            Nom de l'utilasateur
                         </div>
                                <div class="menu">
                                    
                                <ul class="mn">
                                    <li ><a class="active" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question'?>">Lister des Questions</a></li>
                                    <span><i><img src="<?= WEB_ROUTE.'img/ic-liste-active.png' ;?>" alt="liste"></i></span>    
                                    <li ><a href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.question'?>">Creer Questions</a></li>
                                    <span><i><img src="<?= WEB_ROUTE.'img/ic-ajout.png' ;?>" alt="liste"></i></span>                                            
                                    <li ><a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.joueur'?>">Listes des Joueurs</a></li>
                                    <span><i><img src="<?= WEB_ROUTE.'img/ic-liste.png' ;?>" alt="liste"></i></span>                                                            
                                    <li ><a href="<?= WEB_ROUTE.'?controlleurs=security&views=inscription'?>">Creer admin</a></li>
                                    <span><i><img src="<?= WEB_ROUTE.'img/ic-ajout.png' ;?>" alt="liste"></i></span>                                    
                                </ul>
                                </div>
                            <?php endif ?>
                    </div>
                 </div>
                </div>
          
<?php 
   
    require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>
<style>
    .avatar{
        width: 280px;
        height: 160px;
        background-color: #C90017;
        margin-top: 3%;
    }
 .menu{
        float: left;
    }
    span i img{
        width: 20px;
        height: 20px;
        float: right;
        margin-top: -10%;
        margin-right: 5%;
    }
    .menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 280px;
  background-color: #fff;
}

.menu li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
  font-family: Arial, Helvetica, sans-serif;
}

.menu li a.active {
  background-color: #F3F3F3;
  color: black;
}

.menu li a:hover:not(.active) {
  background-color: #F3F3F3;
  color: black;
}
.menu li a:hover{
    border-left: 5px solid black;
}
   .navbar{
       background-color: #F9F9F9;
       border: none;
     
      
       
   }
   .container{
       padding: 0;
       width: 95%;
   }
   .nav-item a:hover{
        background-color: #ddd;
   }
   .nav-item a{
        background-color: #C4C4C4;
   }
  
   
  
</style>
               
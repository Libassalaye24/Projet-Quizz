 
<div class="container mt-5">
    <div class="row conect ">
        <?php if(est_joueur()): ?>
<!--      <img src="<?php echo UPLOAD_DIR . basename($_FILES['file1']['name']) ; ?>" alt=""> 
 -->       
          <?php endif ?>
        <?php if(est_connect()): ?>
                <ul class="ml-auto mt-2">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion' ?>">Deconnexion</a>
                    </li>
                </ul>
        <?php endif ?>

    </div>
    <?php if(est_admin()): ?>
    <div class="row admin">
        <div class="col-4">
            <div class=" photo">
                mklwklwedlw
<!--                 <img src="<?php echo UPLOAD_DIR . basename($_FILES['file1']['name']) ; ?>" alt="">
 -->            </div>
            <div class="vertical-menu">
                <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question'?>" class="active">Liste des questions</a>
                <span><img src="<?= WEB_ROUTE.'img/ic-liste-active.png' ?>" alt=""></span>
                <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.question'?>">Ajouter Questions</a>
                <span><img src="<?= WEB_ROUTE.'img/ic-ajout.png' ?>" alt=""></span>
                <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.joueur'?>">Liste des joueurs</a>
                <span><img src="<?= WEB_ROUTE.'img/ic-liste.png' ?>" alt=""></span>
                <a href="<?= WEB_ROUTE.'?controlleurs=security&views=inscription'?>">Creer admin</a>
                <span><img src="<?= WEB_ROUTE.'img/ic-ajout-active.png' ?>" alt=""></span>
            </div>
        </div>
        <div class="col-6">
                
        </div>
    </div>
    <?php endif ?>
</div>

<style>
    .vertical-menu {
  width: 300px; 
}
.vertical-menu img{
    width: 20px;
    height: 20px;
    float: right;
    margin-top: -13%;
    margin-right: 5%;
}
.photo{
    width: 300px;
    height: 135px;
    background-color: #c90017;
}

.vertical-menu a {
  background-color: #eee; 
  color: black; 
  display: block; 
  padding: 12px; 
  text-decoration: none; 
}

.vertical-menu a:hover {
  background-color: #ccc; 
}


.admin{
    background-color: #fff;
}
.conect{
    padding: 0;
    background-color: #F9F9F9;
}
  .row{
      padding: 0;
  }
  .conect ul {
      list-style: none  ;

  }
  .conect ul li a{
      text-decoration: none;
      color: black;
  }
  
  .conect a{
      padding: 12px;
      background-color: #ddd;
  }
  .conect a:hover{
     background-color: grey;
    
  }

</style>
               
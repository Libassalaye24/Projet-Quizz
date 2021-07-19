<?php

 if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
 require_once(ROUTE_DIR.'views/imc/header.html.php');
  



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

 

         <div class="container ">
         <div class="row mt-3 p-4 ">
                 <div class="card text-left col  border border-danger rounded">
                   <div class="card-body col-md-10 ml-auto mr-auto   ">
                   <h3 class="card-title " style="color:#c90017;" ><b><?=isset($user['id']) ? "Modifier" : "S'inscrire"; ?></b></h3>
                    <h5>Tester votre niveau de culture generale</h5>
                      <form   method="POST"  action="<?php WEB_ROUTE?>" enctype="multipart/form-data"  >
                        <input type="hidden" name="controlleurs" value="security">
                        <input type="hidden" name="action" value="<?=!isset($user['id']) ? 'inscription': 'edit' ?>">
                        <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : ""; ?>">
                              <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text"
                                                class="form-control" name="name" id="" aria-describedby="helpId" placeholder="name"  value="<?=isset($user['name']) ? $user['name'] : ""; ?>">
                                            <small id="helpId" class="form-text text-danger"> <?=isset($arrayError['name']) ? $arrayError['name'] : ""; ?></small>
                                        </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="text"
                                            class="form-control" name="prenom" id="" aria-describedby="helpId" placeholder="prenom"  value="<?=isset($user['prenom']) ? $user['prenom'] : ""; ?>">
                                        <small id="helpId" class="form-text text-danger"> <?=isset($arrayError['prenom']) ? $arrayError['prenom'] : ""; ?></small>
                                    </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text"
                                        class="form-control" name="login" id="" aria-describedby="helpId" placeholder="login"  value="<?=isset($user['login']) ? $user['login'] : "";  ?>">
                                    <small id="helpId" class="form-text text-danger"> <?=isset($arrayError['login']) ? $arrayError['login'] : ""; ?></small>
                                </div>
                              <div class="row">
                                  <div class="col">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="password"
                                                class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Password" value="<?=isset($user['password']) ? $user['password'] : ""; ?>">
                                            
                                                <small id="helpId" class="form-text text-danger"> <?=isset($arrayError['password']) ? $arrayError['password'] : ""; ?></small>
                                        </div>
                                  </div>
                                  <div class="col">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="password"
                                                class="form-control" name="password2" id="" aria-describedby="helpId" placeholder="Confirm Password"  value="<?=isset($user['password2']) ? $user['password2'] : ""; ?>">
                                            <small id="helpId" class="form-text text-danger"> <?=isset($arrayError['password2']) ? $arrayError['password2'] : ""; ?></small>
                                        </div>
                                  </div>
                              </div>
                                <div class="form-group">
                                  <label for=""></label>
                                  <input type="file" class="form-control-file" name="file1" id="" placeholder="" aria-describedby="fileHelpId" value="<?=isset($user['file1']) ? $user['file1'] : ""; ?>">
                                  <small class="form-text text-danger"><?php echo isset($arrayError['file1']) ? $arrayError['file1'] :  isset($arrayError['fileSize']) ? $arrayError['fileSize'] :  ( isset($arrayError['fiel']) ? $arrayError['fiel'] : ""); ?></small>
                                </div>
                                <br>
                                <button type="submit" name="" id="" class="btn  form-control"  ><b><?=isset($user['id']) ? "Modification" : "Inscription"; ?></b></button>
                                <hr class="my-4">
                                <?php if(est_admin()):?>
                                  <div>
                                <a href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.admin'?>"><b>Annuler ?</b> </a>
                                </div>
                                <?php else: ?>
                                  <div>
                                <a href="<?= WEB_ROUTE.'?controlleurs=security&views=connexion'?>"><b>Se connecter ?</b> </a>
                                </div>
                                <?php endif ?>
                              </form>
                   </div>
                 </div>
            </div>
         </div>
<?php 
   require_once(ROUTE_DIR.'views/imc/footer.html.php');
?>

  <style>
     .titre h3{
      text-align: center;
      color: #fff;
    word-wrap: nowrap;
    font-size: 32px;
    margin-left: 3%;
    margin-top: 25px;
    }
    .titre{
      background-color: #c90017;
    }
    .btn{
      background-color: #c90017;
      color: #fff;
    }
    .btn:hover{
      background-color: #fff;
      color: #c90017;
      border-color: #c90017;
    }
   
  </style>
<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Pagination</title>
</head>
 
<body>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>name</th>
        </tr>
      </thead>
      <tbody id="letterList">
      </tbody>
    </table>
    <div>
      <button class="btn" onclick="firstPage()">|<</button>
          <button class="btn" onclick="previous()">
            <</button>
              <span id="pageInfo"></span>
              <button class="btn" onclick="nextPage()">></button>
              <button class="btn" onclick="lastPage()">>|</button>
    </div>
  </div>
  <script>
      let letterList = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
showList();
function showList(){
    let tableList = "";
    for(let i = 0; i < letterList.lenght;i++){
      if(i<letterList.length){
        tableList += `
        <tr>
          <td>${letterList[i]}</td>
        </tr>
      `  
      }
    }
    document.getElementById('letterList').innerHTML=tableList;
   // showPageInfo();
  }
  </script>
</body>
 
</html>
<!-- <?php for($i=1;$i<=$pts;$i++): ?>
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
                        </div> -->



      <!-- 
        <div id="mySidepanel" class="sidepanel ">
            
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.question'?>">Liste des questions</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.admin'?>">Creer Admin</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.joueur'?>">Liste des joueurs</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=creer.question'?>">Creer Questions</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=list.admin '?>">Liste des Admins</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=admin&views=tab.bord '?>">Tableau de bord</a>
            <a onclick="closeNav()" href="<?= WEB_ROUTE.'?controlleurs=security&views=deconnexion '?>">Se deconnecter</a>
        
        </div>

    <button class="openbtn" onclick="openNav()" >&#9776; </button> -->

    <div class="card ">
                  <div class="card-body ">
                      
                    <h3 class="card-title " style="color:#c90017;" ><b><?=isset($user['id']) ? "Modifier" : "S'inscrire"; ?></b></h3>
                    <h5>Tester votre niveau de culture generale</h5>
                      <form   method="POST"  action="<?php WEB_ROUTE?>" enctype="multipart/form-data"  >
                        <input type="hidden" name="controlleurs" value="security">
                        <input type="hidden" name="action" value="<?=!isset($user['id']) ? 'inscription': 'edit' ?>">
                        <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : ""; ?>">
                      <label for="" class="ml-3"><b>Prenom </b></label>  
                      <div class="input-group col-md-8"> 
                                <input type="text" id="" name="prenom" class="form-control  btn-lg input_user" placeholder="prenom" value="<?=isset($user['prenom']) ? $user['prenom'] : ""; ?>"  >
                        </div>
                        <div class="danger">
                            <?=isset($arrayError['prenom']) ? $arrayError['prenom'] : ""; ?>
                          </div>
                        <br>
                        
                        <label for="" class="ml-3"><b>Nom</b> </label>
                        <div class="input-group col-md-8">
                                <input type="text" id="" name="name" class="form-control  btn-lg input_user" placeholder="nom" value="<?=isset($user['name']) ? $user['name'] : ""; ?>"  >
                          
                        </div>
                        <div class="danger">
                            <?=isset($arrayError['name']) ? $arrayError['name'] : ""; ?>
                          </div>
                        <br>
                                <label for="" class="ml-3"><b>login </b></label>
                            <div class="input-group col-md-8">
                                <input type="text" id="" name="login" class="form-control  btn-lg input_lock" placeholder="Email address"  value="<?=isset($user['login']) ? $user['login'] : ""; ?>">
                                <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                                      </div>
                                </div>  
                                
                                <div class="danger">
                                <?=isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
                          </div>
                         
                            <br>
                            <label for="" class="ml-3"><b>Password</b></label>
                            <div class="input-group col-md-8">
                                    <input type="password" id="" name="password" class="form-control  btn-lg input_lock " placeholder="Password" value="<?=isset($user['password']) ? $user['password'] : ""; ?>" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                            <?=isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
                          </div>
                              <br>
                              <label for="" class="ml-3"><b>Confirm Password</b></label> 
                            <div class="input-group col-md-8">
                                    <input type="password" id="" name="password2" class="form-control  btn-lg input_lock " placeholder="Confirm Password" >
                                    <div class="input-group-append">
                                          <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                      </div>
                              </div>
                              <div class="danger">
                            <?=isset($arrayError['password2']) ? $arrayError['password2'] : ""; ?>
                          </div>
                              <br>
                              
                              <div class="col-md-8">
                                <label for="file" ><b>Choisir un Avatar</b></label>
                                    <input type="file" name="file1" class="form-control item " id="file"/>
                               </div>
                               <div class="danger">
                                 <?php echo isset($arrayError['file1']) ? $arrayError['file1'] : ""; ?>
                               </div>
                              
                              <br>
                              <button type="submit" class="btn btn-lg  btn-block   red" name="submit" ><b><?=isset($user['id']) ? "Modification" : "Inscription"; ?></b></button>

                          </form>
                    
                

              </div>
            </div>
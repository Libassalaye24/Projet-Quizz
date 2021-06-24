wjdqkkkkdjwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww  

<?php   if ($_SERVER['REQUEST_METHOD'] == 'GET'):  ?>
                                        
                                        <?php    if (isset($_GET['views'])):  ?>
                                                   
                                        <?php     if ($_GET['views'] == 'ajouter') :  ?>
                                           <?php   for($i=0;$i<3;$i++):  ?>
                                            <div class="form-group ml-4">
                                               <label for="">Reponse </label>
                                               <div class="row">
                                                   <div class="col-6 ml-4">
                                                       <input type="text" name="reponse" id="" class="form-control bg-white " placeholder="" aria-describedby="helpId" value="<?=isset($quest['reponse']) ? $quest['reponse']: '' ?>">
                                                       <small class="text-danger"> <?=isset($arrayError['reponse']) ? $arrayError['reponse'] : ""; ?></small>
                                                   </div>
                                                   <div class="col-4">
                                                       <input type="checkbox" class="form-check-input checks" name="" id="" value="checkedValue" >
                                                       <input type="radio" name="" class="ml-5 mt-2" id="">
                                                   </div>
                                               </div>
                                          </div>
                                           <?php endfor ?>
                                        <?php endif ?>
                                        <?php endif ?>
                                        <?php endif ?>
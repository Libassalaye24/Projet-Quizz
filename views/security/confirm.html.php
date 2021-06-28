
<?php  require_once(ROUTE_DIR.'views/imc/entete.html.php'); ?>
<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>



            <input type="hidden" name="controlleurs" value="admin">
             <input type="hidden" name="action" value="supprimer">
             <input type="hidden" name="id" value="<?=isset($quest['id']) ? $quest['id'] : ""; ?>">
    <div class="container">
    <div class="card text-white bg-dark">
      <div class="card-body">
        <h4 class="card-title">Confirmation</h4>
        <p class="card-text">Voulez-vous supprimer cette question</p>
            <a name="" id="" class="btn btn-danger" href="<?=WEB_ROUTE.'?controlleurs=admin&views=confirm&id='.$quest['id']?>" role="button">OUI</a>
            <a name="" id="" class="btn btn-warning" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.question'?>" role="button">NON</a>
      </div>
    </div>

    </div>



















<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
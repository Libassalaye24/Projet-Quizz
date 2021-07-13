
<?php  require_once(ROUTE_DIR.'views/imc/entete.html.php'); ?>
<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>


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
            <input type="hidden" name="controlleurs" value="admin">
             <input type="hidden" name="action" value="supprimer">
             <input type="hidden" name="id" value="<?=isset($quest['id']) ? $quest['id'] : ""; ?>">
    <div class="container">
    <div class="card text-white bg-dark">
      <div class="card-body">
        <h4 class="card-title">Confirmation</h4>
        <p class="card-text">Voulez-vous supprimer cette question</p>
        <a name="" id="" class="btn btn-warning" href="<?=WEB_ROUTE.'?controlleurs=admin&views=list.question'?>" role="button">NON</a>
            <a name="" id="" class="btn btn-danger" href="<?=WEB_ROUTE.'?controlleurs=admin&views=confirm&id='.$quest['id']?>" role="button">OUI</a>
      </div>
    </div>

    </div>



















<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
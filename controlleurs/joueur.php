<?php 
if (!est_joueur()) header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');
    
     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['views'])) {
            if ($_GET['views'] == 'jeu') {
                require(ROUTE_DIR.'views/joueur/jeu.html.php');
            }elseif ($_GET['views'] == 'meilleurs') {
                require(ROUTE_DIR.'views/joueur/meilleurs.html.php'); 
               
              
            }
           
        }else {
            require_once(ROUTE_DIR.'views/security/connexion.html.php');
        }
    }elseif ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action']=='jeux') {
              
              //$_SESSION['reps']=$_POST['reps'];
               header("location:".WEB_ROUTE.'?controlleurs=joueur&views=jeu&page='.$_SESSION['suivant']);
            }
        }
    }
?>
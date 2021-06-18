
<?php 
if (!est_admin()) header("location:".WEB_ROUTE.'?controlleurs=security&view=connexion');
    
     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['views'])) {
            if ($_GET['views'] == 'list.question') {
                require(ROUTE_DIR.'views/admin/list.question.html.php');
            }elseif ($_GET['views'] == 'creer.question') {
                require(ROUTE_DIR.'views/admin/creer.question.html.php'); 
            }elseif ($_GET['views'] == 'list.joueur') {
                require(ROUTE_DIR.'views/admin/list.joueur.html.php'); 
            }elseif ($_GET['views'] == 'creer.admin') {
                require(ROUTE_DIR.'views/admin/creer.admin.html.php'); 
            }elseif ($_GET['views'] == 'tab.bord') {
                require(ROUTE_DIR.'views/admin/tab.bord.html.php'); 
            }elseif ($_GET['views'] == 'list.admin') {
                require(ROUTE_DIR.'views/admin/list.admin.html.php'); 
            }
           
        }else {
            require_once(ROUTE_DIR.'views/security/connexion.html.php');
        }
    }
?>
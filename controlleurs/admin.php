
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
            }elseif ($_GET['views'] == 'ajouter') {
                require(ROUTE_DIR.'views/admin/creer.question.html.php'); 
              
            }

           
        }else {
            require_once(ROUTE_DIR.'views/security/connexion.html.php');
        }
    }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'question') {
                unset($_POST['controlleurs']);
                unset($_POST['action']);
                unset($_POST['btn_submit']);
          
                validation();
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
               
            }
        }
    }
    function validation():void{
        if (est_vide($_POST['question'])) {
            $arrayError['question'] = 'champs obligatoire';
            $_SESSION['arrayError']=$arrayError;
        }
    
        if (est_vide($_POST['nbr_pts'])) {
            $arrayError['nbr_pts']= 'champs obliagtoire';
            $_SESSION['arrayError']=$arrayError;
        }
        if (est_vide($_POST['reponse'])) {
            $arrayError['reponse']= 'champs obliagtoire';
            $_SESSION['arrayError']=$arrayError;
        }
       
        header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
        if (form_valid($arrayError)) {
            add_question($_POST);
            $_SESSION['sucess_Question'] = 'votre question est crée' ;
            header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');

        }
    }
?>
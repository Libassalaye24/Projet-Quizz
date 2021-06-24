
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
               
              
            }elseif($_GET['views'] == 'modif'){
                $id=$_GET['id'];
               // $question = modif_question();
                $quest = find_question_id($id);
                require_once(ROUTE_DIR.'views/admin/creer.question.html.php'); 
            }elseif ($_GET['views'] == 'supprimer') {
                $_SESSION['id']=$_GET['id'];
                $id = $_SESSION['id'];
                 $quest = find_question_id($id);
                 //supprime_quest();
                require_once(ROUTE_DIR.'views/security/confirm.html.php'); 
            }elseif ($_GET['views'] == 'confirm') {
                delete_question();
                require_once(ROUTE_DIR.'views/admin/list.question.html.php'); 
            }

           
        }else {
            require_once(ROUTE_DIR.'views/security/connexion.html.php');
        }
    }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'question') {
              
                if (isset($_POST['btn_submit'])) {
                    unset($_POST['controlleurs']);
                    unset($_POST['action']);
                    unset($_POST['btn_submit']);
          
                validation($_POST);
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                }elseif (isset($_POST['nbr_submit_question'])) {
                    if (est_vide($_POST['nbr_reps'])) {
                       
                        $arrayError['nbr_reps'] = 'champs obligatoire';
                        $_SESSION['arrayError']=$arrayError;
                        header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                    }elseif (!est_entier($_POST['nbr_reps'])) {
                        $arrayError['nbr_reps'] = 'saisir une valeur';
                        $_SESSION['arrayError']=$arrayError;
                        header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                    }else {
                        $nbr_reps = $_POST['nbr_reps'];
                        $_SESSION['nbr_reps'] = $nbr_reps;
                        //die('entre');
                        header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                    }
                }
               
               
            }elseif ($_POST['action'] == 'modif') {
                unset($_POST['controlleurs']);
                unset($_POST['action']);
                unset($_POST['btn_submit']);
                validation($_POST);
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');
            }
        }
    }
    function validation(array $data):void{
       
        $arrayError=array();
        extract($data);
        valid_input($question,'question',$arrayError);
        valid_point($nbr_pts,'nbr_pts',$arrayError);
        valid_nbr_reponse($nbr_reps,'nbr_reps',$arrayError);
       
       // header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
        if (form_valid($arrayError)) {
            if( isset($question['id'])){
                if (est_admin()) {
                  modif_question($data);
                  header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                }
                
              }
              if (empty($question['id']) ) {

               
               /*  $arrayReponse['reponse0']=$question['reponse0']; */
               for($i=0;$i<$nbrreps;$i++){
                   $arrayReponse['reponse'.$i]=$data['reponse'.$i];
               }
               $data['reponse'] = $arrayReponse;
                add_question($data);
                $_SESSION['sucess_Question'] = 'votre question est crée' ;
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');               
             }

        }else {
            $_SESSION['arrayError']=$arrayError;
            header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
        }
    }
    function supprime_quest(){
        $id = $_SESSION['id'];
        $ok = suppression_question($id);
        if ($ok) {

          header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');
          exit();
        }
      }
    function delete_question(){
      
       
        $id = $_SESSION['id'];
        $ok = suppression_question($id);
        
       
        if ($ok) {
            unset($user[$_GET['id']]);
           header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');         
           exit();  
        }
    }

?>
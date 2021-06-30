
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
                $_SESSION['id']=$_GET['id'];
                $id=$_SESSION['id'];
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
                $_SESSION['id']=$_GET['id'];
                $id = $_SESSION['id'];
                $quest = find_question_id($id);
               $ok =  suppression_question($id);
              
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
                        $tpquest = $_POST['tpquest'];
                        $ques= $_POST['question'];
                        $reps=$_POST['reponse'.$i];
                        $pts=$_POST['nbr_pts'];
                        $_SESSION['reponse'.$i] = $reps;
                        $_SESSION['pts'] = $pts;
                        $_SESSION['question'] = $ques;
                        $_SESSION['tpquest'] = $tpquest;
                        $_SESSION['nbr_reps'] = $nbr_reps;
                        //die('entre');
                        header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                    }
                }
               
               
            }elseif ($_POST['action'] == 'modif') {
                if (isset($_POST['btn_submit'])) {
                    unset($_POST['controlleurs']);
                    unset($_POST['action']);
                    unset($_POST['btn_submit']);
                    validation($_POST);
                    header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');
                }elseif (isset($_POST['Modif_quest'])) {
                   
                    $nbr_reps = $_POST['nbr_reps'];
                    $tpquest = $_POST['tpquest'];
                    $ques= $_POST['question'];
                    $reps=$_POST['reponse'.$i];
                    $pts=$_POST['nbr_pts'];
                    $_SESSION['reponse'.$i] = $reps;
                    $_SESSION['pts'] = $pts;
                    $_SESSION['question'] = $ques;
                    $_SESSION['tpquest'] = $tpquest;
                    $_SESSION['nbr_reps'] = $nbr_reps;
                    //die('entre');
                    $value=$_SESSION['id'];
                 header('location:'.WEB_ROUTE.'?controlleurs=admin&views=modif&id='.$value['id']);
                 if (isset($_SESSION['id'])) {
                    unset($_SESSION['id']);
                }
                if (isset($_SESSION['question'])) {
                    unset($_SESSION['question']);
                }
                if (isset($_SESSION['pts'])) {
                    unset($_SESSION['pts']);
                }
               /*  if (isset($_SESSION['nbr_reps'])) {
                    unset($_SESSION['nbr_reps']);
                } */
                            

             }
             
               
            }elseif ($_POST['action'] == 'fixer_question') {
                $_SESSION['fixer_question']=$_POST['nbrQuest'];
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
            if( isset($data['id'])){
                if (est_admin()) {
                    $arrayReponse=[];
                    //$nbrreps=$_SESSION['nbr_reps'];
                    for($i=1;$i<=$data['nbr_reps'];$i++){
                       // $arrayReponse[]=$data['reponse'.$i];
                      // $arrayReponse[$i]=$data['reponse'.$i];
                     
                       array_push($arrayReponse,$data['reponse'.$i]);
                       
                        
                    }
                    $data['reponse'] = $arrayReponse;
                  modif_question($data);
                  header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
                }
                
              }
              if (empty($data['id']) ) {

               $arrayReponse=[];
               //$nbrreps=$_SESSION['nbr_reps'];
               for($i=1;$i<=$data['nbr_reps'];$i++){
                  // $arrayReponse[]=$data['reponse'.$i];
                 // $arrayReponse[$i]=$data['reponse'.$i];
                
                  array_push($arrayReponse,$data['reponse'.$i]);
                  
                   
               }
               $data['reponse'] = $arrayReponse;
              
              
                add_question($data);
            
               
                $_SESSION['sucess_Question'] = 'Question crée avec succée' ;
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');               
             }

        }else {
            $_SESSION['arrayError']=$arrayError;
            header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.question');
        }
    }
  /*   function supprime_quest(){
        $id = $_SESSION['id'];
        $json= file_get_contents(ROUTE_DIR.'data/question.json');
      // 2 convertir le json
      $arrayQuestion = json_decode($json ,true);
      $users[]=$arrayQuestion; 
     
      foreach ($users as $user) {
          if ($user['id'] != $id) {
            unset($user['question']);
            unset($user['reponse']);
          
          }
      }
      } */
   /*  function delete_question(){
      
       
        $id = $_SESSION['id'];
        $ok = suppression_question($id);
        $quest = find_question_id($id);
        
       
        if ($ok) {
            unset($quest);
           header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');         
           exit();  
        }
    }
 */
?>
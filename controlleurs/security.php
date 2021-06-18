<?php 


if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
       if ($_GET['views']=='connexion') {
        require(ROUTE_DIR.'views/security/connexion.html.php');
       }elseif($_GET['views']=='inscription') {
        require(ROUTE_DIR.'views/security/inscription.html.php');
       }elseif($_GET['views']=='deconnexion') {
           deconnexion();
           header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');  
       }
    }else{
            require(ROUTE_DIR.'views/security/connexion.html.php');
        }
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['action'])) {
            if ($_POST['action']=='connexion') {
                
            connexion($_POST['login'],$_POST['password']);
            }elseif($_POST['action']=='inscription') {
              
                    unset($_POST['submit']);
                    unset($_POST['action']);
                    unset($_POST['controlleurs']);
                   
                    inscription($_POST,$_FILES);
                   
            }
        }
}


function connexion(string $login,string $password):void{
    $arrayError=array();
    valide_email($login,'login',$arrayError);
     validation_password($password,$arrayError,'password');

     if (form_valid($arrayError)) {
        // appel du model
        $user = find_login_password($login , $password);
       
        if (count($user)==0) {
          $arrayError['erreurConnexion']="login ou password incorrect ";
          $_SESSION['arrayError']= $arrayError;
          header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
        }else{
           // session_start();
            $_SESSION ['userConnect']= $user;
            if ($user['role']=='ROLE_ADMIN') {
                header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');
            }elseif ($user['role']== 'ROLE_JOUEUR') {
                header('location:'.WEB_ROUTE.'?controlleurs=joueur&views=jeu');
            }
        }
     }else {
         $_SESSION['arrayError']=$arrayError;
         header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
     }
}

function inscription(array $data ,array $files):void{
    $arrayError=array();
    extract($data);
    validation_password($password,$arrayError,'password'); 
    valide_email($login,'login',$arrayError);      
    validation_username($prenom,'prenom',$arrayError);
    validation_username($name,'name',$arrayError);
     /* valide_avatar($avatar,'avatar',$arrayError); */  
     
    if(login_exist($login)){
            $arrayError['login'] = 'Ce login existe déjà';
            $_SESSION['arrayError']=$arrayError;
            header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
            
        } 
       
       
        if ($password != $password2){
            $arrayError['password2'] = 'Les deux password ne sont pas identiques';
        } 
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
      if (empty($files['file1']['name'])) {
        $arrayError['file1'] = 'Le champs est obligatoire';
      }elseif ($files['file1']['size'] > 500000) {
        $arrayError['fileSize'] = 'La taille est grande';
      }
       
       

    if(form_valid($arrayError)) {
       
            // appel du model
          if ( to_uploads($_FILES)) {
            $data['file1'] = $files['file1']['name'];
          }
             
             unset($data['password2']);
             unset($data['controlleurs']);
             if (est_admin()) {
                $data['role'] = 'ROLE_ADMIN';
               }else {
                    $data['role'] = 'ROLE_JOUEUR';
            }
            
        
            add_user($data);
            if (est_admin()) {
              header('location:'.WEB_ROUTE.'?controlleurs=admin&views=list.question');
            }else {
              header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
            }
         }else {
            
             if (est_admin()) {
              $_SESSION['arrayError']=$arrayError;
              header('location:'.WEB_ROUTE.'?controlleurs=admin&views=creer.admin');
             }else {
              $_SESSION['arrayError']=$arrayError;
              header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
             }
         }
}
function deconnexion():void{
    unset($_SESSION['userConnect']);
}
?>
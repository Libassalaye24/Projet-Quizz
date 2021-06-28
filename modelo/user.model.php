<?php
    function find_login_password(string $login,  string $password){
        // 1 lire le contenu du fichier
        $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
        // 2 convertir le json
        $arrayUser = json_decode($json ,true);
        foreach ($arrayUser as $user) {
           if (($user['login']==$login && $user['password']==$password) ) {
               return $user;
           }
        }
        return [];
    }
    function login_exist(string $login):array{
        // 1 lire le contenu du fichier
        $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
        // 2 convertir le json
        $arrayUser = json_decode($json ,true);
        foreach($arrayUser as $user){
            if ($user['login']==$login) {
              return $user;
            }
        }
        return [];
    }
    function add_user(array $user){
       // 1 lire le contenu du fichier
       $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
       // 2 convertir le json
       $user['id'] = uniqid();
       $arrayUser = json_decode($json ,true);
       $arrayUser[] = $user;
       $json= json_encode($arrayUser);
       file_put_contents(ROUTE_DIR.'data/user.data.json',$json);
    }
    function add_question(array $question){
        $js=file_get_contents(ROUTE_DIR.'data/question.json');
        $question['id'] = uniqid();
       
        $arrayQuestion = json_decode($js,true);
        $arrayQuestion[] = $question;
        $js=json_encode($arrayQuestion);
        file_put_contents(ROUTE_DIR.'data/question.json',$js);
    }
    function suppression_user(string $id):bool{
         // 1 lire le contenu du fichier
       $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
       // 2 convertir le json
       $arrayUser = json_decode($json ,true);
       $users=[];
       $users[]=$arrayUser; 
       $ok =false;
       foreach ($users as $user) {
           if ($user['id'] != $id) {
               $ok = true;
           }
       }
       return $ok;
    }
    function suppression_question(string $id):bool{
        // 1 lire le contenu du fichier
      $json= file_get_contents(ROUTE_DIR.'data/question.json');
      // 2 convertir le json
      $arrayQuestion = json_decode($json ,true);
      $users[]=$arrayQuestion; 
      $ok =false;
      foreach ($users as $user) {
          if ($user['id'] != $id) {
              $ok = true;
          }
      }
      return $ok;
   }
    
    function find_user_id(string $id):array{
         // 1 lire le contenu du fichier
       $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
       // 2 convertir le json
       $arrayUser = json_decode($json ,true);
      foreach ($arrayUser as $user) {
          if ($user['id'] == $id) {
              return $user;
          }
      }
      return [];
    }
    function find_question_id(string $id):array{
        // 1 lire le contenu du fichier
      $json= file_get_contents(ROUTE_DIR.'data/question.json');
      // 2 convertir le json
      $arrayQuestion = json_decode($json ,true);
     foreach ($arrayQuestion as $question) {
         if ($question['id'] == $id) {
             return $question;
         }
     }
     return [];
   }
    function ajout_fichier(array $array){
        $json= json_encode($array);
        file_put_contents(ROUTE_DIR.'data/user.data.json',$json);
    }
    function modif_user(array $user_new){
         // 1 lire le contenu du fichier
       $json= file_get_contents(ROUTE_DIR.'data/user.data.json');
       // 2 convertir le json
       $arrayUser = json_decode($json ,true);
        foreach ($arrayUser as $key => $user_old) {
            if ($user_old['id']==$user_new['id']) {
                $arrayUser[$key] = $user_new;
            }
        }
      ajout_fichier($arrayUser);
    }
    function modif_question(array $new_id){
          // 1 lire le contenu du fichier
       $json= file_get_contents(ROUTE_DIR.'data/question.json');
       // 2 convertir le json
       $arrayQuestion = json_decode($json ,true);
        foreach ($arrayQuestion as $key => $oldQuest) {
            if ($oldQuest['id'] == $new_id['id']) {
                $arrayQuestion[$key] = $new_id;
            }
        }
        $json= json_encode($arrayQuestion);
        file_put_contents(ROUTE_DIR.'data/question.json',$json);
    }
?>
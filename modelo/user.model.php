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
       $users[]=$arrayUser; 
       $ok =false;
       foreach ($users as $user) {
           if ($user['id'] != $id) {
               $ok = true;
           }
       }
       return $ok;
    }
    function delete_question(){
        
    }

?>
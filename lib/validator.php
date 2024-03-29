<?php
//fonction de validation
function est_vide( $valeur):bool{
    return empty($valeur);
}

function est_entier($valeur):bool{
    $entier = (int) $valeur;
    return is_int($entier);

}

function est_numerique($valeur):bool{
    $entier = (int) $valeur;
    return is_int($entier);

}

function est_email($valeur):bool{
    if (filter_var($valeur ,FILTER_VALIDATE_EMAIL)) {
        return true;
    }else {
        return false;
    }
}
function form_valid($arrayError):bool{
    if (count($arrayError)==0) {
        return true;
    }
    return false;
}

 function longueur_password( $valeur ,int $min=6 , int $max=10):bool{
     return strlen($valeur) < $min ||strlen($valeur) > $max ; 
 }

    function valide_email( $valeur , string $key, array &$arrayError):void{
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (!est_email($valeur)) {
            $arrayError[$key]= 'saisir un email valide (exemple@gmail.com)';
        }
    }

    function validation_password( $valeur,array &$arrayError, string $key ,int $min=6 , int $max=10):void{
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (strlen($valeur) < $min ||strlen($valeur) > $max  ) {
            $arrayError[$key]= "la taille est compris entre $min et $max ";
        }
      
    }
    function validation_username( $valeur , string $key,array &$arrayError){
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }
    }
    /* function valide_bithdate(string $valeur, string $key , &$arrayError){
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (!est_numerique($valeur)) {
            $arrayError[$key]= 'saisir des valeurs'; 
        }
    } */
  
    function verif_sexe(){
        
    }
    function separ_date(string $date){
        return explode('/',$date);
        
    }
    function bisextile_annee(int $annee):bool{
        if ($annee%400==0 || ($annee%100!=0 && $annee%4==0)){
            return true ;
    
          }
          return false;
        }
        function valid_mois($valeur):bool{
            if (($valeur>0)&& $valeur<=12) {
               return true;
            }else {
                return false;
            }
        }
        /* fonction pour valider annee  */
function bisextille_annee(int $annee):bool{
    if ($annee%400==0 || ($annee%100!=0 && $annee%4==0)){
        return true ;

      }
      return false;
    }
    
    
      
    function date_valide($date , $separateur):bool{
        $separateur = explode('/',$date);
     if (valid_mois($separateur[1])==true) {
        switch ($separateur[1]) {
            case '01':
            case '03':
            case '05':
            case '07':
            case '10':
            case '12':
            case '08':
                
                return $separateur[0]>0 && $separateur[0]<=31;

            case '04':
            case '09':
            case '06':
            case '11':  
                return $separateur[0]>0 && $separateur[0]<=30;
               
             case 2 :
                    if (bisextile_annee($separateur[2])==true) {
                        return $separateur[0] > 0 && $separateur[0] <= 29;
                    } else {
                        return $separateur[0] > 0 && $separateur[0] <= 28;
                    }
            default:
                return false;
                break;
        }
     }else {
         return false;
     }
    }
   
    function valideChamps(string $valeur1,string $key,array &$arrayError):void{
        if (est_vide($valeur1)) {
            $arrayError[$key] = 'champs obligatoire';
        }
    }
    function valideReps(string $valeur1,string $key,array &$arrayError):void{
        if ($valeur1 == 'Type de reponse') {
            $arrayError[$key] = 'veiller choisir le type de reponse';
        }
    }
    function validation_date($date,$separateur,string $key, array &$arrayError):void{
        $separateur = explode('/',$date);
       if (est_vide($date)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (!est_numerique($date)) {
            $arrayError[$key]= 'saisir des valeurs'; 
        }elseif (!date_valide($date,$separateur)) {
            $arrayError[$key] = "la date est invalide";
        }elseif ($separateur[2] > 2021) {
            $arrayError[$key] = "saisir une annee inferieur a 2021";
        }
    }
    function valide_avatar($file ,string $key ,array &$arrayError):void{
        if (empty($file)) {
            $arrayError[$key] = "champs obligatoire";
            
        }
    }


    function valid_input($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key] = "Ce champ est obligatoire ";
        }
    }
    
    function valid_point($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key] = "Ce champ est obligatoire ";
        }elseif ($valeur<=0) {
            $arrayError[$key] = "Veillez saisir un nombre positif";
        }
    }
    
    
    function valid_nbr_reponse($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key] = "Ce champ est obligatoire ";
        }elseif ($valeur<=0) {
            $arrayError[$key] = "Veillez saisir un nombre positif";
        }
    }


    function nombrePageTotal($array, $nombreElement): int {
        $nombrePage = 0;
        $longueurArray = count($array);
        if ($longueurArray % $nombreElement == 0) {
            $nombrePage = $longueurArray / $nombreElement;
        } else {
            $nombrePage = ($longueurArray / $nombreElement) + 1;
        }
        return $nombrePage;
    }

function get_element_to_display(array $array, int $page, int $nombreElement): array {
    $arrayElement = [];
    $indiceDepart = ($page*$nombreElement) - $nombreElement;
    $limitElement = $page * $nombreElement;
    for ($i = $indiceDepart; $i < $limitElement; $i++) {
        if ($i >= count($array)) {
            return $arrayElement;
        } else {
            $arrayElement[] = $array[$i];
        }
    }
    return $arrayElement;
}
function valide_image(array $files,string $key,array &$arrayError){
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    $file_ext=strtolower(end(explode('.',$files['file1']['name'])));
  if (empty($files[$key]['name'])) {
    $arrayError[$key] = 'Le champs est obligatoire';
  }elseif ($files[$key]['size'] > 500000) {
    $arrayError[$key] = 'La taille est grande';
  }elseif(in_array($file_ext,$extensions)=== false){
      $arrayError[$key]='le fichier n\'est pas une image';
  }
}
   
?>
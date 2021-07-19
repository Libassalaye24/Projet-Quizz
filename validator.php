<?php 

// fonction de validation
function est_vide( $valeur): bool {
    return empty($valeur);
}


function is_email($valeur):bool{
    if (filter_var($valeur, FILTER_VALIDATE_EMAIL)) {
        return true;
      }else {
        return false;
      }
}
function form_valid($arrayError):bool{
    if (count($arrayError)==0){
        return true;
    }
    return false;
}

function validation_login(string $valeur, string  $key, array &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le login est obligatoire";
    }elseif (!is_email($valeur)) {
        $arrayError[$key] = "le login doit être un email (exemple123@gmail.com)";
    }
        
}
function validation_password( $valeur, string $key , array &$arrayError, $min = 6, $max = 10){
    if (est_vide($valeur)) {
        $arrayError[$key] = "le password est obligatoire";
    }elseif ((strlen($valeur) < $min)||(strlen($valeur) > $max)) {
        $arrayError[$key] = "le password doit être compris entre $min et $max";
    }
}
function validation_champ( $valeur, string  $key,  &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire";
    }   
}
function validation_champs(  $valeur, string  $key,  &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire";
    }elseif(!is_numeric($valeur)){
        $arrayError[$key] = "Ce champ doit être numérique";

    }
}
function type_reponse( $valeur, string  $key,  &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Veuillez donner le type de réponse";
    }   
}
function reponse( $valeur, string  $key,  &$arrayError){
    if(est_vide($valeur)) {
        $arrayError[$key] = "Veuillez donner la réponse";
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

function get_element_to_display($array,  $page, int $nombreElement): array {
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






?>
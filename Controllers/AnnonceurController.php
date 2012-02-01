<?php
if (!isset($_GET["id"])){
    $errorMessage = "<h2>Erreur</h2><br/>"; 
    $errorMessage .= "Identifiant de l'annonceur manquant.";
     include("Views/erreur.php");
     exit();
}else{
    $id = Validations_ValidationParams::validateId($_GET);
    $requete = new WebServices_Annonceur;
    $annonceur = $requete->getAnnonceurById($id);
}





<?php
//Appel du bootstrap pour les toutes premières commandes
require_once "bootstrap.php";

// Domaine
$domaine = 'http://localhost';
// Récupération uri
$uri = $_SERVER['PHP_SELF'];
// Gestion du dossier (= base url)
$baseUrl = '/projetAnnonces';
//Récupération de l'url relative
$uri = str_replace($baseUrl, '', $uri);
//récupération du nom de la page
$page = substr($uri,11);

//Liste des pages de l'application (chaque page possède un controller correspondant)
$listeDesPages = array("annonces","annonce","annonceurs","annonceur","profil","inscription",
                        "administration","mesFavoris","mesAnnonces","ajoutAnnonce","modifierAnnonce",
                         "login","logout","test");

//Le controller principal est appelé pour chaque page
require_once "Controllers/GeneralController.php";

//Selection du controller appropié (sauf cas 404)
if($page == "accueil"){
    include("Controllers/IndexController.php");
}elseif (in_array($page, $listeDesPages ,true)){
    include('Controllers/'.$page.'Controller.php');
}else{
    $page = "404";
}

//Inclusion du layout
include("Views/Layout.php");
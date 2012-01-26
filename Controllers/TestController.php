<?php

$testAnnonce = new Model_Annonce;
$testAnnonce->setFromArray(array("_titre" => "Titre de l'annonce", "_id_annonce" => "12"));

$testAnnonceur = new Model_Annonceur;
$testAnnonceur->setFromArray(array("_nom" => "Nom du gars", "_prenom" => "Prénom du gars"));

$testWebService = new WebServices_Webservice;

$testValidation = Validations_ValidationParams::validateId(array("id"=>"12"));

$testAuth = new Authentification_Authentification("boo","boo");

$testLoginForm = new Forms_LoginForm;

$requete = new WebServices_Regions;
$testListeRegions = $requete->getListeRegions();
		
$requete = new WebServices_Region;
$testRegion = $requete->getRegionById(12);
		
$requete = new WebServices_Departements;
$testListeDepartements = $requete->getListeDepartements();
		
$requete = new WebServices_Departement;
$testDepartement = $requete->getDepartementById(85);
		
$requete = new WebServices_Villes;
$testListeVilles = $requete->getListeVillesSimplified();
		
$requete = new WebServices_Ville;
$testVille = $requete->getVilleById(1200);
	
$requete = new WebServices_Types;
$testListeTypes = $requete->getListeTypes();
		
$requete = new WebServices_Type;
$testType = $requete->getTypeById(2);
		
$requete = new WebServices_Categories;
$testListeCategories = $requete->getListeCategories();
		
$requete = new WebServices_Categorie;
$testCategorie = $requete->getCategorieById(2);
		
$requete = new WebServices_Authentification;
$testAuthentification = $requete->getAuthentification("admin","admin");


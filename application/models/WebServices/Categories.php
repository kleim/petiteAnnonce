<?php

class Application_Model_WebServices_Categories extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/categories';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}

	public function getListeCategories(){
		
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$categories = $xml->getElementsByTagName("categorie");
		foreach($categories as $categorie){
			
			$newCategorie = new Application_Model_Categorie;
			
			$newCategorie->setIdCategorie($categorie->getAttribute("id_categorie"));
			$newCategorie->setNomCategorie($categorie->getAttribute("nom_categorie"));
			
			$listeCategories[] = $newCategorie;
		}
		return $listeCategories;
		
		
	}
	
}


<?php

class Application_Model_WebServices_Categorie extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/categories';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getCategorieById($id){
		
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$newCategorie = new Application_Model_Categorie;
		$newCategorie->setIdCategorie($id);
		$newCategorie->setNomCategorie($xml->getElementsByTagName("categorie")->item(0)->nodeValue);
		return $newCategorie;
	}
	
}


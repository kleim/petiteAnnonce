<?php

class Application_Model_WebServices_Types extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/types';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}

	public function getListeTypes(){
		
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$types = $xml->getElementsByTagName("type");
		foreach($types as $type){
			
			$newType = new Application_Model_Type;
			$newType->setIdType($type->getAttribute("id_type"));
			$newType->setNomType($type->getAttribute("nom_type"));
			
			$listeTypes[] = $newType;
		}
		return $listeTypes;
		
		
	}
	
}


<?php

class WebServices_Types extends WebServices_WebService
{
	protected static $service = 'subservices/types';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
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
			
			$newType = new Model_Type;
			$newType->setIdType($type->getAttribute("id_type"));
			$newType->setNomType($type->getAttribute("nom_type"));
			
			$listeTypes[] = $newType;
		}
		return $listeTypes;
		
		
	}
	
}


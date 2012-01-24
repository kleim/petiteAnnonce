<?php

class Application_Model_WebServices_Type extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/type';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getTypeById($id){
		
		$this->setParameterGet(array('id_type'=> $id,));
		
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);

		$newType = new Application_Model_Type;
		$newType->setIdType($id);
		$newType->setNomType($xml->getElementsByTagName("type")->item(0)->nodeValue);
		
		return $newType;
	}
	
}


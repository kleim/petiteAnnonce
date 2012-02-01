<?php

class WebServices_Categorie extends WebServices_WebService
{
	protected static $service = 'subservices/categorie';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getCategorieById($id){
		
		$this->setParameterGet(array('id_categorie'=> $id,));
		
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$newCategorie = new Model_Categorie;
		$newCategorie->setIdCategorie($id);
		$newCategorie->setNomCategorie($xml->getElementsByTagName("categorie")->item(0)->nodeValue);
		return $newCategorie;
	}
	
}


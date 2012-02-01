<?php

class WebServices_Departements extends WebServices_WebService
{
	protected static $service = 'subservices/departements';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeDepartements(){
	
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);

		$departements = $xml->getElementsByTagName("departement");
		foreach($departements as $departement){
			
			$newDepartement = new Model_Departement;
			
			//code
			$newDepartement->setId_Departement($departement->getAttribute("code"));
			//nom_departement
			$newDepartement->setNom_Departement($departement->getAttribute("nom_departement"));
			//id_region
			$newDepartement->setRegion($departement->getAttribute("id_region"));
			
			$listeDepartements[] = $newDepartement;
		}
		return $listeDepartements;
	
	}
	
}


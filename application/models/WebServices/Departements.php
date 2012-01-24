<?php

class Application_Model_WebServices_Departements extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/departements';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeDepartements(){
	
		// Section pour passer par un service web
		// $bodyXML = $this->getResponseBody();
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->load('../data/departements.xml');

		$departements = $xml->getElementsByTagName("departement");
		foreach($departements as $departement){
			
			$newDepartement = new Application_Model_Departement;
			
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


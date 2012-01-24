<?php

class Application_Model_WebServices_Departement extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/departements';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getDepartementById($id){
		
		// Section pour passer par un service web
		// $bodyXML = $this->getResponseBody();
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->load('../data/departements.xml');
		
		$departementRecherche = false;
		
		$departements = $xml->getElementsByTagName("departement");
		foreach($departements as $departement){
			
			if ($departement->getAttribute("code") == $id){
				$departementRecherche = new Application_Model_Departement;
				$departementRecherche->setId_Departement($departement->getAttribute("code"));
				$departementRecherche->setNom_Departement($departement->getAttribute("nom_departement"));
				$departementRecherche->setRegion($departement->getAttribute("id_region"));
				break;
			}
		}
		return $departementRecherche;
	}
	
}


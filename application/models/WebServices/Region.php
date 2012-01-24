<?php

class Application_Model_WebServices_Region extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/regions';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getRegionById($id){

		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->load('../data/regions.xml');
		
		$regionRecherchee = false;
		
		$regions = $xml->getElementsByTagName("region");
		foreach($regions as $region){			
			if ( $region->getAttribute("id_region") == $id){
				$regionRecherchee = new Application_Model_Region;
				$regionRecherchee->setId_Region($region->getAttribute("id_region"));
				$regionRecherchee->setNom_Region($region->getAttribute("nom_region"));
				break;
			}
		}
		return $regionRecherchee;
	}
	
}


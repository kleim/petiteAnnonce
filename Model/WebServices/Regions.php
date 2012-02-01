<?php

class WebServices_Regions extends WebServices_WebService
{
	protected static $service = 'subservices/regions';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeRegions(){
	
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$regions = $xml->getElementsByTagName("region");
		foreach($regions as $region){
			
			$newRegion = new Model_Region;
			
			//id_region
			$newRegion->setId_Region($region->getAttribute("id_region"));
			//nom_region
			$newRegion->setNom_Region($region->getAttribute("nom_region"));
			
			$listeRegions[] = $newRegion;
		}
		return $listeRegions;
	
	}
}


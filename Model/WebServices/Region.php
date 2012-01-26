<?php

class WebServices_Region extends WebServices_WebService
{
	protected static $service = 'subservices/regions';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getRegionById($id){

		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$regionRecherchee = false;
		
		$regions = $xml->getElementsByTagName("region");
		foreach($regions as $region){			
			if ( $region->getAttribute("id_region") == $id){
				$regionRecherchee = new Model_Region;
				$regionRecherchee->setId_Region($region->getAttribute("id_region"));
				$regionRecherchee->setNom_Region($region->getAttribute("nom_region"));
				break;
			}
		}
		return $regionRecherchee;
	}
	
}


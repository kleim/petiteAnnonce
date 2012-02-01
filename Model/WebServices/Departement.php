<?php

class WebServices_Departement extends WebServices_WebService
{
	protected static $service = 'subservices/departements';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getDepartementById($id){
		
		// Section pour passer par un service web
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$departementRecherche = false;
		
		$departements = $xml->getElementsByTagName("departement");
		foreach($departements as $departement){
			
			if ($departement->getAttribute("code") == $id){
				$departementRecherche = new Model_Departement;
				$departementRecherche->setId_Departement($departement->getAttribute("code"));
				$departementRecherche->setNom_Departement($departement->getAttribute("nom_departement"));
				$departementRecherche->setRegion($departement->getAttribute("id_region"));
				break;
			}
		}
		return $departementRecherche;
	}
	
}


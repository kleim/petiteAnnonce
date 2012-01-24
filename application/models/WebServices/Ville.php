<?php

class Application_Model_WebServices_Ville extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/villes';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getVilleById($id){
		
		// Section pour passer par un service web
		// $bodyXML = $this->getResponseBody();
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->load('../data/villes.xml');

		$villeRecherchee = false;
		
		$villes = $xml->getElementsByTagName("ville");
		foreach($villes as $ville){
			
			if ($ville->getAttribute("id_ville") == $id){
			
				$villeRecherchee = new Application_Model_Ville;
				//id_ville
				$villeRecherchee->setId_Ville($ville->getAttribute("id_ville"));
				//nom_ville
				$villeRecherchee->setNom_Ville($ville->getAttribute("nom_ville"));
				//code_postal
				$villeRecherchee->setCode_Postal($ville->getAttribute("code_postal"));
				//latitude
				$villeRecherchee->setLatitude($ville->getAttribute("latitude"));
				//longitude
				$villeRecherchee->setLongitude($ville->getAttribute("longitude"));
				//departement
				$villeRecherchee->setDepartement($ville->getAttribute("id_departement"));
				
				break;
			
			}
		}
		return $villeRecherchee;
	}
	
}


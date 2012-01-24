<?php

class Application_Model_WebServices_Villes extends Application_Model_WebServices_WebService
{
	protected static $service = 'subservices/villes';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeVilles(){
	
		// Section pour passer par un service web
		// $bodyXML = $this->getResponseBody();
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->load('../data/villes.xml');

		$villes = $xml->getElementsByTagName("ville");
		foreach($villes as $ville){
		
			$newVille = new Application_Model_Ville;
			//id_ville
			$newVille->setId_Ville($ville->getAttribute("id_ville"));
			//nom_ville
			$newVille->setNom_Ville($ville->getAttribute("nom_ville"));
			//code_postal
			$newVille->setCode_Postal($ville->getAttribute("code_postal"));
			//latitude
			$newVille->setLatitude($ville->getAttribute("latitude"));
			//longitude
			$newVille->setLongitude($ville->getAttribute("longitude"));
			//departement
			$newVille->setDepartement($ville->getAttribute("id_departement"));
			
			$listeVilles[] = $newVille;
		}
		return $listeVilles;
	
	}
	
	public function getListeVillesSimplified(){
	
		// Section pour passer par un service web
		// $bodyXML = $this->getResponseBody();
		// $xml = new DOMDocument();
		// $xml->preserveWhiteSpace = false;
		// $xml->loadXML($bodyXML);
		
		//Section pour passer par un fichier (nettement plus rapide...)
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->load('../data/villes.xml');

		$villes = $xml->getElementsByTagName("ville");
		foreach($villes as $ville){
		
			$newVille = new Application_Model_Ville;
			//id_ville
			$newVille->setId_Ville($ville->getAttribute("id_ville"));
			//nom_ville
			$newVille->setNom_Ville($ville->getAttribute("nom_ville"));
			//code_postal
			$newVille->setCode_Postal($ville->getAttribute("code_postal"));
			
			$listeVilles[] = $newVille;
		}
		return $listeVilles;
	
	}
	
}


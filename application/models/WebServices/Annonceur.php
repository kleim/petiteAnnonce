<?php

class Application_Model_WebServices_Annonceur extends Application_Model_WebServices_WebService
{
	protected static $service = 'annonceur';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
		
	public function getAnnonceurById($id){

		$this->setParameterGet(array(
		'id'  => $id,
		));
		
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);

		$newAnnonceur = new Application_Model_Annonceur;
		$newAnnonceur->setId_Annonceur($id);
		$newAnnonceur->setPseudo($xml->getElementsByTagName("pseudo")->item(0)->nodeValue);
		$newAnnonceur->setMdp($xml->getElementsByTagName("mdp")->item(0)->nodeValue);
		$newAnnonceur->setNom($xml->getElementsByTagName("nom")->item(0)->nodeValue);
		$newAnnonceur->setPrenom($xml->getElementsByTagName("prenom")->item(0)->nodeValue);
		$newAnnonceur->setAdresse($xml->getElementsByTagName("adresse")->item(0)->nodeValue);
		$ville["id_ville"] = $xml->getElementsByTagName("ville")->item(0)->getAttribute("id_ville");
		$ville["nom_ville"] = $xml->getElementsByTagName("ville")->item(0)->nodeValue;
		$newAnnonceur->setVille($ville);
		$newAnnonceur->setTelephone($xml->getElementsByTagName("telephone")->item(0)->nodeValue);
		$newAnnonceur->setEmail($xml->getElementsByTagName("email")->item(0)->nodeValue);

		return $newAnnonceur;		

	}
	
}


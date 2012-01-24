<?php

class Application_Model_WebServices_Annonceurs extends Application_Model_WebServices_WebService
{
	protected static $service = 'annonceurs';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeAnnonceurs($page,$nbElementsParPage){
		
		// Section pour passer par un service web
		$this->setParameterGet(array(
		'page'  => $page,
		'nbElements' => $nbElementsParPage
		));
		
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$annonceurs = $xml->getElementsByTagName("annonceur");
		foreach($annonceurs as $annonceur){
			
			$newAnnonceur = new Application_Model_Annonceur;
			$newAnnonceur->setId_Annonceur($annonceur->getAttribute("id"));
			$newAnnonceur->setPseudo($annonceur->getElementsByTagName("pseudo")->item(0)->nodeValue);
			$newAnnonceur->setNom($annonceur->getElementsByTagName("nom")->item(0)->nodeValue);
			$newAnnonceur->setPrenom($annonceur->getElementsByTagName("prenom")->item(0)->nodeValue);
			$newAnnonceur->setAdresse($annonceur->getElementsByTagName("adresse")->item(0)->nodeValue);
			$ville["id_ville"] = $annonceur->getElementsByTagName("ville")->item(0)->getAttribute("id_ville");
			$ville["nom_ville"] = $annonceur->getElementsByTagName("ville")->item(0)->nodeValue;
			$newAnnonceur->setVille($ville);
			$newAnnonceur->setTelephone($annonceur->getElementsByTagName("telephone")->item(0)->nodeValue);
			$newAnnonceur->setEmail($annonceur->getElementsByTagName("email")->item(0)->nodeValue);

			$listeAnnonceurs[] = $newAnnonceur;
		}
		return $listeAnnonceurs;		
	}
	
}


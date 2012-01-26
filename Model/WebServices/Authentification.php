<?php

class WebServices_Authentification extends WebServices_WebService
{
	protected static $service = 'subservices/authentification';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
		
	public function getAuthentification($login,$mdp){
		
		$this->setAuth($login,$mdp);
                $this->setUri($this->_uri);
                $response = $this->request();
                if ($response->isError()) {
                   return false;
                }else{
                
		$bodyXML = $response->getbody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		
		$newAnnonceur = new Model_Annonceur;
		$newAnnonceur->setId_Annonceur($xml->getElementsByTagName("id")->item(0)->nodeValue);
		$newAnnonceur->setPseudo($xml->getElementsByTagName("pseudo")->item(0)->nodeValue);
		$newAnnonceur->setMdp($xml->getElementsByTagName("mdp")->item(0)->nodeValue);
		$newAnnonceur->setNom($xml->getElementsByTagName("nom")->item(0)->nodeValue);
		$newAnnonceur->setPrenom($xml->getElementsByTagName("prenom")->item(0)->nodeValue);
		$newAnnonceur->setAdresse($xml->getElementsByTagName("adresse")->item(0)->nodeValue);
		$newAnnonceur->setVille($xml->getElementsByTagName("ville")->item(0)->getAttribute("id_ville"));
		$newAnnonceur->setTelephone($xml->getElementsByTagName("telephone")->item(0)->nodeValue);
		$newAnnonceur->setEmail($xml->getElementsByTagName("email")->item(0)->nodeValue);
		$newAnnonceur->setStatut($xml->getElementsByTagName("statut")->item(0)->nodeValue);
		
		return $newAnnonceur;	
                }

	}
	
}


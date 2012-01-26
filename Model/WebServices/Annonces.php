<?php

class WebServices_Annonces extends WebServices_WebService
{
	protected static $service = 'annonces';
	protected $_uri;
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getListeAnnonces(){
	
		$bodyXML = $this->getResponseBody();
		
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);
		$annonces = $xml->getElementsByTagName("annonce");
		foreach($annonces as $annonce){
			//id_annonce
			$id_annonce = $annonce->getAttribute("id_annonce");
			$listeAnnonces[$id_annonce]['_id_annonce'] = $id_annonce;
			//titre
			$titre = $annonce->getElementsByTagName("titre")->item(0)->nodeValue;
			$listeAnnonces[$id_annonce]['_titre'] = $titre;
			//description
			$description = $annonce->getElementsByTagName("description")->item(0)->nodeValue;
			$listeAnnonces[$id_annonce]['_description'] = $description;
			//prix
			$prix = $annonce->getElementsByTagName("prix")->item(0)->nodeValue;
			$listeAnnonces[$id_annonce]['_prix'] = $prix;
			//expiration
			$expiration = $annonce->getElementsByTagName("expiration")->item(0)->nodeValue;
			$listeAnnonces[$id_annonce]['_expiration'] = $expiration;
			//type
			$type = $annonce->getElementsByTagName("type")->item(0)->getAttribute("id_type");
			$listeAnnonces[$id_annonce]['_type'] = $type;
			//categorie
			$categorie = $annonce->getElementsByTagName("categorie")->item(0)->getAttribute("id_categorie");
			$listeAnnonces[$id_annonce]['_categorie'] = $categorie;
			//ville
			$ville = $annonce->getElementsByTagName("ville")->item(0)->getAttribute("id_ville");
			$listeAnnonces[$id_annonce]['_ville'] = $ville;
			//annonceur
			$annonceur = $annonce->getElementsByTagName("annonceur")->item(0)->getAttribute("id_annonceur");
			$listeAnnonces[$id_annonce]['_annonceur'] = $annonceur;
		}
		return $listeAnnonces;
	
	}
	
	
}


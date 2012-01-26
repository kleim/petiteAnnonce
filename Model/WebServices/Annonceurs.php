<?php

class WebServices_Annonceurs extends WebServices_WebService
{
	protected static $service = 'annonceurs';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
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
		
		$root = $xml->getElementsByTagName("annonceurs")->item(0);
		$listeAnnonceurs["infos"]["page"] = $root->getAttribute("page");
		$listeAnnonceurs["infos"]["nbAnnonceurs"] = $root->getAttribute("nbAnnonceurs");
		$listeAnnonceurs["infos"]["nbElementsParPage"] = $root->getAttribute("nbElementsParPage");
		
		$annonceurs = $xml->getElementsByTagName("annonceur");
		foreach($annonceurs as $annonceur){
			
			$newAnnonceur = new Model_Annonceur;
			$newAnnonceur->setId_Annonceur($annonceur->getAttribute("id"));
			$newAnnonceur->setPseudo($annonceur->getElementsByTagName("pseudo")->item(0)->nodeValue);
			$newAnnonceur->setNom($annonceur->getElementsByTagName("nom")->item(0)->nodeValue);
			$newAnnonceur->setPrenom($annonceur->getElementsByTagName("prenom")->item(0)->nodeValue);
			$newAnnonceur->setAdresse($annonceur->getElementsByTagName("adresse")->item(0)->nodeValue);
			$newAnnonceur->setVille($annonceur->getElementsByTagName("ville")->item(0)->getAttribute("id_ville"));
			$newAnnonceur->setTelephone($annonceur->getElementsByTagName("telephone")->item(0)->nodeValue);
			$newAnnonceur->setEmail($annonceur->getElementsByTagName("email")->item(0)->nodeValue);
			
			$listeAnnonceurs[] = $newAnnonceur;
		}
		return $listeAnnonceurs;		
	}
        
        public function inscriptionAnnonceur($donneesInscription){
            
            	// Section pour passer par un service web
		$this->setParameterPost($donneesInscription);
                $this->getResponseBody('POST');
                return true;
        }
	
}


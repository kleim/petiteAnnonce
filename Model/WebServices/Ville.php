<?php

class WebServices_Ville extends WebServices_WebService
{
	protected static $service = 'subservices/villes';
	protected $_uri;
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
	public function __construct(){
		$this->_uri = parent::$domaine.self::$service;
	}
	
	public function getVilleById($id){
		
            	$this->setParameterGet(array(
                    'id_ville'  => $id,
		));
    
		$bodyXML = $this->getResponseBody();
		$xml = new DOMDocument();
		$xml->preserveWhiteSpace = false;
		$xml->loadXML($bodyXML);

		$villeRecherchee = false;
		
		$villes = $xml->getElementsByTagName("ville");
		foreach($villes as $ville){
			
			if ($ville->getAttribute("id_ville") == $id){
			
				$villeRecherchee = new Model_Ville;
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


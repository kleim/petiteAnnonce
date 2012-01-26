<?php

class Model_Region
{

	// ----- Définition des attributs -----
	protected $_id_region;
	protected $_nom_region;
 
	// ----- Définition des getters et setters ------
	
	public function getId_Region() {
		return $this->_id_region;
	}
	public function setId_Region($id_region) {
		$this->_id_region = $id_region;
	}
	
	public function getNom_Region() {
		return $this->_nom_region;
	}
	public function setNom_Region($nom_region) {
		$this->_nom_region = $nom_region;
	}

	// ----- Définition des méthodes ------

	/**
	 * Cette fonction sert à initialiser ou modifier plusieurs attributs de l'objet en même temps
	 * @param $array = Tableau de valeurs : le clé correspond à au nom d'un attribut et la valeur est celle à lui affecter.
	 * @return $this = L'objet initialisé 
	 */
	public function setFromArray(array $array){
		foreach($array as $key=>$value){
			$this->$key = $value;
		}
		return $this;
	}

	/**
	 * Cette fonction sert à obtenir le prénom et le nom d'un annonceur dans une seule chaine de caractères
	 * @return $chaine_nom_prenom = La chaine de caractère contenant le nom et le prénom
	 */
	public function __toString(){
		return $this->_nom_region;
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des regions du service web
	 * @return $liste_regions = Le tableau contenant la liste des objets regions
	 */
	public static function getAllRegions(){
		$requete = new WebServices_Regions;
		return $requete->getListeRegions();
	}
	
	/**
	 * Cette fonction sert à obtenir les données d'une region par son identifiant
	 * @return $region = L'objet region contenant les données ou false si la region n'existe pas
	 */
	public static function getRegionById($id){
		$requete = new WebServices_Region;
		return $requete->getRegionById();
	}


}


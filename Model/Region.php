<?php

class Model_Region
{

	// ----- D�finition des attributs -----
	protected $_id_region;
	protected $_nom_region;
 
	// ----- D�finition des getters et setters ------
	
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

	// ----- D�finition des m�thodes ------

	/**
	 * Cette fonction sert � initialiser ou modifier plusieurs attributs de l'objet en m�me temps
	 * @param $array = Tableau de valeurs : le cl� correspond � au nom d'un attribut et la valeur est celle � lui affecter.
	 * @return $this = L'objet initialis� 
	 */
	public function setFromArray(array $array){
		foreach($array as $key=>$value){
			$this->$key = $value;
		}
		return $this;
	}

	/**
	 * Cette fonction sert � obtenir le pr�nom et le nom d'un annonceur dans une seule chaine de caract�res
	 * @return $chaine_nom_prenom = La chaine de caract�re contenant le nom et le pr�nom
	 */
	public function __toString(){
		return $this->_nom_region;
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des regions du service web
	 * @return $liste_regions = Le tableau contenant la liste des objets regions
	 */
	public static function getAllRegions(){
		$requete = new WebServices_Regions;
		return $requete->getListeRegions();
	}
	
	/**
	 * Cette fonction sert � obtenir les donn�es d'une region par son identifiant
	 * @return $region = L'objet region contenant les donn�es ou false si la region n'existe pas
	 */
	public static function getRegionById($id){
		$requete = new WebServices_Region;
		return $requete->getRegionById();
	}


}


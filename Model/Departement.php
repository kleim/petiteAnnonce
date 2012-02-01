<?php

class Model_Departement
{

	// ----- Définition des attributs -----
	protected $_id_departement;
	protected $_nom_departement;
	protected $_region;
 
	// ----- Définition des getters et setters ------
	
	public function getId_Departement() {
		return $this->_id_departement;
	}
	public function setId_Departement($id_departement) {
		$this->_id_departement = $id_departement;
	}
	
	public function getNom_Departement() {
		return $this->_nom_departement;
	}
	public function setNom_Departement($nom_departement) {
		$this->_nom_departement = $nom_departement;
	}
	
	public function getRegion() {
		return $this->_region;
	}
	public function setRegion($region) {
		$this->_region = $region;
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
	 * Cette fonction sert à obtenir le nom du departement en chaine de caractere
	 * @return $chaine_nom = La chaine de caractère contenant le nom
	 */
	public function __toString(){
		return $this->_nom_departement;
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des departements du service web
	 * @return $liste_departements = Le tableau contenant la liste des objets departements
	 */
	public static function getAllDepartements(){
		$requete = new WebServices_Departements;
		return $requete->getListeDepartements();
	}
	
	/**
	 * Cette fonction sert à obtenir les données d'un departement par son identifiant
	 * @return $departement = L'objet departement contenant les données ou false si le departement n'existe pas
	 */
	public static function getDepartementById($id){
		$requete = new WebServices_Departements;
		return $requete->getDepartementById($id);
	}


}


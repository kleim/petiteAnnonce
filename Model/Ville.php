<?php

class Model_Ville
{

	// ----- Définition des attributs -----
	protected $_id_ville;
	protected $_nom_ville;
	protected $_code_postal;
	protected $_departement;
	protected $_latitude;
	protected $_longitude;
 
	// ----- Définition des getters et setters ------
	public function getId_Ville() {
		return $this->_id_ville;
	}
	public function setId_Ville($id_ville) {
		$this->_id_ville = $id_ville;
	}
	
	public function getNom_Ville() {
		return $this->_nom_ville;
	}
	public function setNom_Ville($nom_ville) {
		$this->_nom_ville = $nom_ville;
	}
	
	public function getCode_Postal() {
		return $this->_code_postal;
	}
	public function setCode_Postal($code_postal) {
		$this->_code_postal = $code_postal;
	}
	
	public function getDepartement() {
		return $this->_departement;
	}
	public function setDepartement($departement) {
		$this->_departement = $departement;
	}
	
	public function getLatitude() {
		return $this->_latitude;
	}
	public function setLatitude($latitude) {
		$this->_latitude = $latitude;
	}
	
	public function getLongitude() {
		return $this->_longitude;
	}
	public function setLongitude($longitude) {
		$this->_longitude = $longitude;
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
	 * @return $chaine_nom = La chaine de caractère contenant le nom
	 */
	public function __toString(){
		return $this->_nom_ville;
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des villes du service web
	 * @return $liste_villes = Le tableau contenant la liste des objets villes
	 */
	public static function getAllVilles(){
		$requete = new WebServices_Villes;
		return $requete->getListeVilles();
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des villes du service web avec seulement le nom, l'id et le code postal
	 * @return $liste_villes = Le tableau contenant la liste des objets villes
	 */
	public static function getAllVillesSimplified(){
		$requete = new WebServices_Villes;
		return $requete->getListeVillesSimplified();
	}
	
	/**
	 * Cette fonction sert à obtenir les données d'une ville par son identifiant
	 * @return $ville = L'objet ville contenant les données ou false si la ville n'existe pas
	 */
	public static function getVilleById($id){
		$requete = new WebServices_Ville;
		return $requete->getVilleById($id);
		
	}


}


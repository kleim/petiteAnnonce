<?php

class Model_Type
{

	// ----- Définition des attributs -----
	protected $_id_type;
	protected $_nom_type;
 
	// ----- Définition des getters et setters ------
	
	public function getIdType() {
		return $this->_id_type;
	}
	public function setIdType($id_type) {
		$this->_id_type = $id_type;
	}
	
	public function getNomType() {
		return $this->_nom_type;
	}
	public function setNomType($nom_type) {
		$this->_nom_type = $nom_type;
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
	 * Cette fonction sert à obtenir le nom du type en chaine de caracteres
	 * @return $chaine_nom = La chaine de caractère contenant le nom
	 */
	public function __toString(){
		return $this->_nom_type;
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des types du service web
	 * @return $liste_types = Le tableau contenant la liste des objets types
	 */
	public static function getAllTypes(){
		$requete = new WebServices_Types;
		return $requete->getListeTypes();
	}
	
	/**
	 * Cette fonction sert à obtenir les données d'un type par son identifiant
	 * @return $type = L'objet type contenant les données ou false si le type n'existe pas
	 */
	public static function getTypeById($id){
		$requete = new WebServices_Type;
		return $requete->getTypeById($id);
	}


}


<?php

class Model_Type
{

	// ----- D�finition des attributs -----
	protected $_id_type;
	protected $_nom_type;
 
	// ----- D�finition des getters et setters ------
	
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
	 * Cette fonction sert � obtenir le nom du type en chaine de caracteres
	 * @return $chaine_nom = La chaine de caract�re contenant le nom
	 */
	public function __toString(){
		return $this->_nom_type;
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des types du service web
	 * @return $liste_types = Le tableau contenant la liste des objets types
	 */
	public static function getAllTypes(){
		$requete = new WebServices_Types;
		return $requete->getListeTypes();
	}
	
	/**
	 * Cette fonction sert � obtenir les donn�es d'un type par son identifiant
	 * @return $type = L'objet type contenant les donn�es ou false si le type n'existe pas
	 */
	public static function getTypeById($id){
		$requete = new WebServices_Type;
		return $requete->getTypeById($id);
	}


}


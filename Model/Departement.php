<?php

class Model_Departement
{

	// ----- D�finition des attributs -----
	protected $_id_departement;
	protected $_nom_departement;
	protected $_region;
 
	// ----- D�finition des getters et setters ------
	
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
	 * Cette fonction sert � obtenir le nom du departement en chaine de caractere
	 * @return $chaine_nom = La chaine de caract�re contenant le nom
	 */
	public function __toString(){
		return $this->_nom_departement;
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des departements du service web
	 * @return $liste_departements = Le tableau contenant la liste des objets departements
	 */
	public static function getAllDepartements(){
		$requete = new WebServices_Departements;
		return $requete->getListeDepartements();
	}
	
	/**
	 * Cette fonction sert � obtenir les donn�es d'un departement par son identifiant
	 * @return $departement = L'objet departement contenant les donn�es ou false si le departement n'existe pas
	 */
	public static function getDepartementById($id){
		$requete = new WebServices_Departements;
		return $requete->getDepartementById($id);
	}


}


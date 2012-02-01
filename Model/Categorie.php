<?php

class Model_Categorie
{

	// ----- D�finition des attributs -----
	protected $_id_categorie;
	protected $_nom_categorie;
 
	// ----- D�finition des getters et setters ------
	
	public function getIdCategorie() {
		return $this->_id_categorie;
	}
	public function setIdCategorie($id_categorie) {
		$this->_id_categorie = $id_categorie;
	}
	
	public function getNomCategorie() {
		return $this->_nom_categorie;
	}
	public function setNomCategorie($nom_categorie) {
		$this->_nom_categorie = $nom_categorie;
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
	 * @return $chaine_nom = La chaine de caract�re contenant le nom
	 */
	public function __toString(){
		return $this->_nom_categorie;
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des categories du service web
	 * @return $liste_categories = Le tableau contenant la liste des objets categories
	 */
	public static function getAllCategories(){
		$requete = new WebServices_Categories;
		return $requete->getListeCategories();
	}
	
	/**
	 * Cette fonction sert � obtenir les donn�es d'une categorie par son identifiant
	 * @return $categorie = L'objet categorie contenant les donn�es ou false si la categorie n'existe pas
	 */
	public static function getCategorieById($id){
		$requete = new WebServices_Categorie;
		return $requete->getCategorieById($id);
	}


}


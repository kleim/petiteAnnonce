<?php

class Model_Photo
{

	// ----- D�finition des attributs -----
	protected $_id_photo;
	protected $_titre;
	protected $_url_photo;
 
	// ----- D�finition des getters et setters ------
	
	public function getId_Photo() {
		return $this->_id_photo;
	}
	public function setId_photo($id_photo) {
		$this->_id_photo = $id_photo;
	}
	
	public function getTitre() {
		return $this->_titre;
	}
	public function setTitre($titre) {
		$this->_titre = $titre;
	}
	
	public function getUrl_Photo() {
		return $this->_url_photo;
	}
	public function setUrl_Photo($url_photo) {
		$this->_url_photo = $url_photo;
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
	 * Cette fonction sert � obtenir le nom du photo en chaine de caracteres
	 * @return $chaine_nom = La chaine de caract�re contenant le nom
	 */
	public function __toString(){
		return $this->_titre;
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des photos relatives � une annonce
	 * @return $liste_photos = Le tableau contenant la liste des objets photos
	 */
	public static function getPhotosByIdAnnonce($id){
		$liste = WebServices_Photos::getPhotosByIdAnnonce($id);
		$liste_photos = array();
		foreach ($liste as $item){
			$photo = new Photo;
			$photo->setFromArray($item);
			$liste_photos[] = $photo;
		}
		return $liste_photos;
	}


}


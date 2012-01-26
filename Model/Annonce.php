<?php

class Model_Annonce
{

	// ----- Définition des attributs -----
	protected $_id_annonce;
	protected $_titre;
	protected $_description;
	protected $_prix;
	protected $_expiration;
	protected $_type;
	protected $_categorie;
	protected $_ville;
	protected $_annonceur;
	protected $_photos;

	// ----- Définition des getters et setters ------
	public function getId_Annonce() {
		return $this->_id_annonce;
	}
	public function setId_Annonce($id_annonce) {
		$this->_id_annonce = $id_annonce;
	}
	public function getTitre() {
		return $this->_titre;
	}
	public function setTitre($titre) {
		$this->_titre = $titre;
	}
	public function getDescription() {
		return $this->_description;
	}
	public function setDescription($description) {
		$this->_description = $description;
	}
	public function getPrix() {
		return $this->_prix;
	}
	public function setPrix($prix) {
		$this->_prix = $prix;
	}
	public function getExpiration() {
		return $this->_expiration;
	}
	public function setExpiration($expiration) {
		$this->_expiration = $expiration;
	}
	public function getType() {
		return $this->_type;
	}
	public function setType($type) {
		$this->_type = $type;
	}
	public function getCategorie() {
		return $this->_categorie;
	}
	public function setCategorie($categorie) {
		$this->_categorie = $categorie;
	}
	public function getVille() {
		return $this->_ville;
	}
	public function setVille($ville) {
		$this->_ville = $ville;
	}
	public function getAnnonceur() {
		return $this->_annonceur;
	}
	public function setAnnonceur($annonceur) {
		$this->_annonceur = $annonceur;
	}
	public function getPhotos() {
		return $this->_photos;
	}
	public function setPhotos($photos) {
		$this->_photos = $photos;
	}

	// ----- Définition des méthodes ------

	/**
	 * Cette fonction renvoie le prix accompagné du sigle €
	 * @return $prixEuro = chaine de carcatère contenant le prix et le suivi du sigle €
	 */
	public function getPrixEuro(){
		return 'Prix : '.$this->_prix.'€';
	}
	
	/**
	 * Cette fonction renvoie le titre sous forme de lien vers la page de l'annonce
	 * @return $titre = chaine de carcatère contenant le titre sous forme de lien
	 */
	public function getTitreLien(){
		return '<a href="annonce?id='.$this->_id_annonce.'">'.$this->_titre.'</a>';
	}
	
	/**
	 * Cette fonction renvoie le pseudo de l'annonceur sous forme de lien vers sa page
	 * @return $pseudo = chaine de carcatère contenant le pseudo sous forme de lien
	 */
	public function getAnnonceurLien(){
		return 'Annonceur : '.$this->_annonceur->getPseudoLien();
	}
	
	/**
	 * Cette fonction renvoie le type sous forme de lien vers toutes les annonces du même type
	 * @return $type = chaine de carcatère contenant le type sous forme de lien
	 */
	public function getTypeLien(){
		return 'Type : <a href="annonces?type='.$this->_type->getIdType().'">'.$this->_type.'</a>';
	}
	
	/**
	 * Cette fonction renvoie la catégorie sous forme de lien vers toutes les annonces de même catégorie
	 * @return $cat = chaine de carcatère contenant la catégorie sous forme de lien
	 */
	public function getCategorieLien(){
		return 'Catégorie : <a href="annonces?categorie='.$this->_categorie->getIdCategorie().'">'.$this->_categorie.'</a>';
	}
	
	/**
	 * Cette fonction renvoie la ville sous forme de lien vers toutes les annonces de la même ville
	 * @return $ville = chaine de carcatère contenant la ville sous forme de lien
	 */
	public function getVilleLien(){
		return 'Ville : <a href="annonces?ville='.$this->_ville->getId_Ville().'">'.$this->_ville.'</a>';
	}
	
	/**
	 * Cette fonction renvoie la description tronquee à $max caractères suivi de [...]
	 * @return $desc = chaine de carcatère contenant la description tronquee
	 */
	public function getDescriptionTronquee(){
		$desc = $this->_description;
		$max = 50; //nombre de caractère autorisé
		$fin = '<a href="annonce?id='.$this->_id_annonce.'">[...]</a>'; //chaîne de fin

		if (strlen($desc)>$max)
		{
		$desc=substr($desc, 0, $max).$fin;
		}

		return $desc;
	}
	
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
	 * Cette fonction sert à obtenir le titre d'un annonce dans une seule chaine de caractères
	 * @return $chaine_titre = La chaine de caractère contenant le titre
	 */
	public function __toString(){
		return 'Annonce n°'.$this->_id_annonce.' : '.$this->_titre;
	}
	
	/**
	 * Cette fonction sert à obtenir l'ensemble des annonces du service web
	 * @return $liste_annonces = Le tableau contenant la liste des objets annonces ou false en cas d'erreur
	 */
	public static function getAllAnnonces(){
		$erreur = false;
		$requete = new WebServices_Annonces;
		$liste = $requete->getListeAnnonces();
		foreach ($liste as $item){
			$item['_ville'] = Ville::getVilleById(1 /*$item['_ville']*/);
			$item['_type'] = Type::getTypeById(1 /*$item['_type']*/);
			$item['_categorie'] = Categorie::getCategorieById(1 /*$item['_categorie']*/);
			$item['_annonceur'] = Annonceur::getAnnonceurById(1 /*$item['_annonceur']*/ );
			$item['_photos'] = Photo::getPhotosByIdAnnonce($item['_id_annonce']);
			if( !$item['_ville'] || !$item['_type'] || !$item['_categorie'] || !$item['_annonceur']){	
				$erreur = true;
			}else{
				$annonce = new Annonce;
				$annonce->setFromArray($item);
				$liste_annonces[] = $annonce;
			}
		}
		if ($erreur){
			return false;
		}else{
			return $liste_annonces;
		}
		
	}
	
	/**
	 * Cette fonction sert à obtenir les données d'une annonce par son identifiant
	 * @return $annonce = L'objet annonce contenant les données ou false si l'annonce n'existe pas ou en cas d'erreur
	 */
	public static function getAnnonceById($id){
		$donnees = WebServices_Annonce::getAnnonceById($id);
		if (!$donnees){
			throw new Zend_Controller_Action_Exception('Annonce inexistante', 404);
		}else{
			$donnees['_ville'] = Ville::getVilleById($donnees['_ville']);
			$donnees['_type'] = Type::getTypeById($donnees['_type']);
			$donnees['_categorie'] = Categorie::getCategorieById($donnees['_categorie']);
			$donnees['_annonceur'] = Annonceur::getAnnonceurById($donnees['_annonceur']);
			$donnees['_photos'] = Photo::getPhotosByIdAnnonce($donnees['_id_annonce']);
			if( !$donnees['_ville'] || !$donnees['_type'] || !$donnees['_categorie'] || !$donnees['_annonceur']){
				return false;
			}else{
				$annonce = new Annonce;
				$annonce->setFromArray($donnees);
				return $annonce;
			}
		}
		
	}


}


<?php

class Model_Annonceur
{

	// ----- D�finition des attributs -----
	protected $_id_annonceur;
	protected $_pseudo;
	protected $_mdp;
	protected $_nom;
	protected $_prenom;
	protected $_adresse;
	protected $_ville;
	protected $_telephone;
	protected $_email;
	protected $_statut;

	// ----- D�finition des getters et setters ------
	public function getId_Annonceur() {
		return $this->_id_annonceur;
	}
	public function setId_Annonceur($id_annonceur) {
		$this->_id_annonceur = $id_annonceur;
	}
	public function getPseudo() {
		return $this->_pseudo;
	}
	public function setPseudo($pseudo) {
		$this->_pseudo = $pseudo;
	}
	public function getMdp() {
		return $this->_mdp;
	}
	public function setMdp($mdp) {
		$this->_mdp = $mdp;
	}
	public function getNom() {
		return $this->_nom;
	}
	public function setNom($nom) {
		$this->_nom = $nom;
	}
	public function getPrenom() {
		return $this->_prenom;
	}
	public function setPrenom($prenom) {
		$this->_prenom = $prenom;
	}
	public function getAdresse() {
		return $this->_adresse;
	}
	public function setAdresse($adresse) {
		$this->_adresse = $adresse;
	}
	public function getVille() {
		return $this->_ville;
	}
	public function setVille($ville) {
		$this->_ville = $ville;
	}
	public function getTelephone() {
		return $this->_telephone;
	}
	public function setTelephone($telephone) {
		$this->_telephone = $telephone;
	}
	public function getEmail() {
		return $this->_email;
	}
	public function setEmail($email) {
		$this->_email = $email;
	}
	public function getStatut() {
		return $this->_statut;
	}
	public function setStatut($statut) {
		$this->_statut = $statut;
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
		return $this->_prenom." ".$this->_nom;
	}
	
	/**
	 * Cette fonction renvoie le pseudo sous forme de lien vers la page de l'annonceur
	 * @return $pseudo = chaine de carcat�re contenant le pseudo sous forme de lien
	 */
	public function getPseudoLien(){
		return '<a href="annonceur?id='.$this->_id_annonceur.'">'.$this->_pseudo.'</a>';
	}
	
	/**
	 * Cette fonction sert � obtenir l'ensemble des annonceurs du service web
	 * @return $liste_annonceurs = Le tableau contenant la liste des objets annonceurs
	 */
	public static function getAllAnnonceurs($page=1,$nbElementsParPage=10){
		$requete = new WebServices_Annonceurs;
		$liste = $requete->getListeAnnonceurs($page,$nbElementsParPage);
		return $liste;
	}
	
	/**
	 * Cette fonction sert � obtenir les donn�es dun annocneur par son identifiant
	 * @return $annonceur = L'objet annonceur contenant les donn�es ou false si l'annonceur n'existe pas
	 */
	public static function getAnnonceurById($id){
		$requete = new WebServices_Annonceur;
		return $requete->getAnnonceurById($id);
	}
        
        
        public function getArrayFromObject() 
        { 
            $array = array(); 
            foreach ($this as $key=>$value) 
            { 
                $array[substr($key,1)] = $value; 
            } 
            return $array; 
        } 


}


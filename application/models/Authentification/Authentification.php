<?php
class Application_Model_Authentification_Authentification
{
	protected $_login;
	protected $_password;
	
	public function __construct($login,$password){
		$this->_login = $login;
		$this->_password = $password;
	}
	
	public function isAnnonceur(){	
		$liste_annonceurs = Application_Model_Annonceur::getAllAnnonceurs();
		if (!$liste_annonceurs){
			throw new Zend_Controller_Action_Exception('Erreur de données', 500);
		}else{
			foreach ($liste_annonceurs as $annonceur){
				if ( ($this->_login == $annonceur->getPseudo()) && ($this->_password == $annonceur->getMdp()) ){
					return $annonceur;
					break;
				}
			}
			return false;
		}
	}
	
	public function setSession(){
		$annonceur = self::isAnnonceur();
		if ($annonceur){
			$user = new Zend_Session_Namespace('user');
			$user->annonceur = $annonceur;
		}
	
	}
	
	public function unsetSession(){
		Zend_Session::destroy();
	}
}




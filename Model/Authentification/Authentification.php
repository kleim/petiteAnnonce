<?php
class Authentification_Authentification
{
	protected $_login;
	protected $_password;
	
	public function __construct($login,$password){
		$this->_login = $login;
		$this->_password = $password;
	}
	
	public function isAnnonceur(){	
                $requete = new WebServices_Authentification;
		return $resultat = $requete->getAuthentification($this->_login,$this->_password);	
	}
	
	public function setSession(){
		$annonceur = self::isAnnonceur();
		if ($annonceur){
			$user = new Zend_Session_Namespace('user');
			$user->annonceur = $annonceur;
		}
                return $annonceur;
	
	}

	public function unsetSession(){
		Zend_Session::destroy();
	}
}




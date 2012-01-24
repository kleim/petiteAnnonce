<?php

class Application_Model_WebServices_WebService extends Zend_Http_Client
{

	protected static $domaine = "http://s397317270.onlinehome.fr/_annonces/";
	
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function isResponseError(){
		
		$response = $this->request();
		if ($response->isError()) {
		  $message = "Erreur de transmission des données.\n";
		  $message .= 'Les infos Serveur sont :'.$response->getStatus().' '.$response->getMessage().'\n ';
		  $message .= $response->getBody();
		  throw new Zend_Controller_Action_Exception($message, 500);
		}
	
	}	
	
	public function getAllResponse(){
				
		$this->setUri($this->_uri);
		$this->isResponseError();
		return $this->request();
	}
	
	public function getResponseBody(){
	
		return $this->getAllResponse()->getBody();
	
	}
}


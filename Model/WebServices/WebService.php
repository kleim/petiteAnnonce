<?php

class WebServices_WebService extends Zend_Http_Client
{

	protected static $domaine = "http://s397317270.onlinehome.fr/_annonces/";
	//protected static $domaine = "http://localhost/services/";
	
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public function isResponseError($response){
		
		if ($response->isError()) {
		  $errorMessage = "<h2>Erreur 500.</h2><br/>";
                  $errorMessage .= "Erreur au niveau du service web.<br/>";
		  $errorMessage .= 'Les infos Serveur sont :'.$response->getStatus().' '.$response->getMessage().'<br/> ';
		  $errorMessage .= $response->getBody();
		  include("Views/erreur.php");
                  exit();
		}
	
	}	
	
	public function getAllResponse($type='GET'){
				
		$this->setUri($this->_uri);
		switch ($type){
			case 'GET': $response = $this->request('GET');
                                    break;
			case 'POST' : $response = $this->request('POST');
                                      break;
                        case 'PUT' : $response = $this->request('PUT');
                                      break;
                        case 'DELETE' : $response = $this->request('DELETE');
                                      break;
		}
                $this->isResponseError($response);
                return $response;

	}
	
	public function getResponseBody($type='GET'){	
		return $this->getAllResponse($type)->getBody();
	
	}
}


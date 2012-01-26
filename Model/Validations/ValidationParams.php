<?php

class Validations_ValidationParams
{

	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	
	/**
	 * Cette fonction sert à obtenir filtre et valider le parametre $id numérique
	 * @return $id = L'id s'il est validé, renvoie sur 404 not found sinon
	 */
	public static function validateId($donnees){		
		$filters = array('id' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('id' => array('NotEmpty', 'Int'));
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($donnees);
		if (!$input->isValid()){
			throw new Zend_Controller_Action_Exception(Zend_Debug::dump($input->getInvalid()), 404);
		}else{
			return $donnees['id'];
		}
	
	}

}


<?php

class Application_Form_InscriptionForm extends Zend_Form
{
	public function init()
	{
		$username = $this->addElement("text", "pseudo", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("Alpha",array("StringLength", false, array(5, 20)),),
		"required" => true,
		"label" => "Pseudo:",
		));
		
		$password = $this->addElement("password", "password", array(
		"filters" => array("StringTrim"),
		"validators" => array("Alnum",array("StringLength", false, array(4, 20)),),
		"required" => true,
		"label" => "Mot de passe:",
		));
		
		$nom = $this->addElement("text", "nom", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("Alpha",array("StringLength", false, array(5, 20)),),
		"required" => true,
		"label" => "Nom:",
		));
		
		$prenom = $this->addElement("text", "prenom", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("Alpha",array("StringLength", false, array(5, 20)),),
		"required" => true,
		"label" => "Prénom:",
		));
		
		$adresse = $this->addElement("text", "adresse", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("Alnum",array("StringLength", false, array(5, 60)),),
		"required" => true,
		"label" => "Adresse:",
		));
		
		$ville = $this->addElement("select", "ville", array(
		"filters" => array("StringTrim", "StringToLower"),
		"required" => true,
		"label" => "Ville:",
		"multiOptions" => (Application_Model_Ville::getAllVilles()),
		));
		
		$tel = $this->addElement("text", "tel", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("Alnum",array("StringLength", false, array(10, 15)),),
		"required" => true,
		"label" => "Telephone:",
		));
		
		$mail = $this->addElement("text", "mail", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array("eMailAdress"),
		"required" => true,
		"label" => "Mail:",
		));
		
		$send = $this->addElement("submit", "send", array(
		"required" => false,
		"ignore" => true,
		"label" => "S'inscrire",
		));

		// $this->setAction();
	}
}


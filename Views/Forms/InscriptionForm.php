<?php

class Forms_InscriptionForm extends Zend_Form
{
	public function init()
	{
		$pseudo = $this->addElement("text", "pseudo", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alpha",
		array("StringLength", false, array(3, 20)),
		),
		"required" => true,
		"label" => "Votre pseudo:",
		));
		$mdp = $this->addElement("password", "mdp", array(
		"filters" => array("StringTrim"),
		"validators" => array(
		"Alnum",
		array("StringLength", false, array(4, 20)),
		),
		"required" => true,
		"label" => "Mot de passe:",
		));
                $nom = $this->addElement("text", "nom", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alpha",
		array("StringLength", false, array(3, 50)),
		),
		"required" => true,
		"label" => "Votre nom:",
		));
                $prenom = $this->addElement("text", "prenom", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alpha",
		array("StringLength", false, array(3, 50)),
		),
		"required" => true,
		"label" => "Votre prénom:",
		));
                $adresse = $this->addElement("text", "adresse", array(
		"filters" => array("StringTrim", "StringToLower"),
		"required" => true,
		"label" => "Votre adresse:",
		));
                $ville = $this->addElement("text", "ville", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alnum",
		array("StringLength", false, array(3, 50)),
		),
		"required" => true,
		"label" => "Ville:",
		));
                $telephone = $this->addElement("text", "telephone", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alnum",
		array("StringLength", false, array(10, 15)),
		),
		"required" => true,
		"label" => "Votre numéro de téléphone:",
		));
                $telephone = $this->addElement("text", "email", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"EmailAddress",
		array("StringLength", false, array(5, 50)),
		),
		"required" => true,
		"label" => "Votre e-mail:",
		));
                
                
		$login = $this->addElement("submit", "inscription", array(
		"required" => false,
		"ignore" => true,
		"label" => "Inscription",
		));
		// Nous souhaitons afficher un message"failed authentication" si n�cessaire;
		// nous le ferons avec le champs "description", nous avons donc besoin
		// d"ajouter decorator.
		$this->setDecorators(array(
		"FormElements",
		array("HtmlTag", array("tag" => "dl", "class" => "zend_form")),
		array("Description", array("placement" => "prepend")),
		"Form"
		));
	}
}



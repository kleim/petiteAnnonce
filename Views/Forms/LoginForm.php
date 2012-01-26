<?php

class Forms_LoginForm extends Zend_Form
{
	public function init()
	{
		$username = $this->addElement("text", "pseudo", array(
		"filters" => array("StringTrim", "StringToLower"),
		"validators" => array(
		"Alpha",
		array("StringLength", false, array(3, 20)),
		),
		"required" => true,
		"label" => "Votre pseudo:",
		));
		$password = $this->addElement("password", "mdp", array(
		"filters" => array("StringTrim"),
		"validators" => array(
		"Alnum",
		array("StringLength", false, array(4, 20)),
		),
		"required" => true,
		"label" => "Mot de passe:",
		));
		$login = $this->addElement("submit", "login", array(
		"required" => false,
		"ignore" => true,
		"label" => "Connexion",
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
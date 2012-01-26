<?php
// Configurer PHP
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

// Chargement automatique des classes (= autoload)
function __autoload($classname) {
	// Zend Framework
	if (0 === strpos($classname, 'Zend')) {
		require_once str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	} 
	elseif (0 === strpos($classname, 'Model')) {
		require_once str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	}
	elseif (0 === strpos($classname, 'WebServices')) {
		require_once 'Model/' . str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	}
	elseif (0 === strpos($classname, 'Validations')) {
		require_once 'Model/' . str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	}	
	elseif (0 === strpos($classname, 'Authentification')) {
		require_once 'Model/' . str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	}
	elseif (0 === strpos($classname, 'Forms')) {
		require_once 'Views/' . str_replace('_', DIRECTORY_SEPARATOR, $classname) . '.php';
	}
}

// Démarrer la session
Zend_Session::start();
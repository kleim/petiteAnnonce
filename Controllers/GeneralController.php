<?php
$loginForm = null;
if(isset($_GET['logout'])){
	Zend_Session::namespaceUnset('user');
}
if(!Zend_Session::namespaceGet('user')){
	$loginForm = new Forms_LoginForm();
	if (isset($_POST["login"])) {
		if ($loginForm->isValid($_POST)) {
			$auth = new Authentification_Authentification($_POST['pseudo'],$_POST['mdp']); 
			$annonceur = $auth->setSession();
                        if(!$annonceur){
                               $loginForm->populate($_POST);
                               $loginError = "Login ou Mot de passe incorrect";
                        }    
                } else {
			$loginForm->populate($_POST);
		}
	}
}
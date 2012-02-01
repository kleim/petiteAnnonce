<?php
$modification = false;

$session = Zend_Session::namespaceGet('user');
$profilInfo = $session['annonceur'];
$modification_ok = false;
$modificationForm = new Forms_ModificationForm();

if (isset($_GET["modif"])){
    $arrayAnnonceur =  $profilInfo->getArrayFromObject();
    $modificationForm->populate($arrayAnnonceur);
    $modification = true;
}
if (isset($_POST["modif_ok"])){
    if ($modificationForm->isValid($_POST)) {
        $donneesModification = $_POST;
        $requete = new WebServices_Annonceur;
        $id = $profilInfo->getId_Annonceur();
        $modification_ok = $requete->modificationAnnonceur($donneesModification,$id);
        $requete2 = new WebServices_Annonceur;
        $user = new Zend_Session_Namespace('user');
	$user->annonceur = $requete2->getAnnonceurById($id);
        $session = Zend_Session::namespaceGet('user');
        $profilInfo = $session['annonceur'];
    }else{
        $modificationForm->populate($_POST);
        $modification = true;
    }//test pour git
}
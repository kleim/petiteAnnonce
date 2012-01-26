<?php
$inscriptionForm = new Forms_InscriptionForm();
$inscription_ok = false;
if (isset($_POST["inscription"])) {
    if ($inscriptionForm->isValid($_POST)) {
        $donneesInscription = $_POST;
        $requete = new WebServices_Annonceurs;
        $inscription_ok = $requete->inscriptionAnnonceur($donneesInscription);
    } else {
        $inscriptionForm->populate($_POST);
    }
}




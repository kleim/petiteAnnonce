<?php
if (isset($_GET["pageNumber"])){
	$pageNumber = $_GET["pageNumber"];
}else{
	$pageNumber = 1;
}
		
$requete = new WebServices_Annonceurs;
$listeAnnonceurs = $requete->getListeAnnonceurs($pageNumber,8);



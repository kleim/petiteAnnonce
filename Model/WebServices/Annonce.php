<?php

class WebServices_Annonce extends WebServices_WebService
{
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public static function getAnnonceById($id){
		
		$liste = WebServices_Annonces::getAllAnnonces();
		foreach ($liste as $item){
			if ($item['_id_annonce']==$id){
				$value = $item;
			}
		}
		if(isset($value)){
			return $value;
		}else{
			return false;
		}
	}
	
}


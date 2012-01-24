<?php

class Application_Model_WebServices_Annonce extends Application_Model_WebServices_WebService
{
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public static function getAnnonceById($id){
		
		$liste = Application_Model_WebServices_Annonces::getAllAnnonces();
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


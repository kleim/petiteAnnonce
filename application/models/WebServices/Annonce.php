<?php

class Application_Model_WebServices_Annonce extends Application_Model_WebServices_WebService
{
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
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


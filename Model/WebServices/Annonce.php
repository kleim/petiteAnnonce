<?php

class WebServices_Annonce extends WebServices_WebService
{
	// ----- D�finition des attributs -----

	// ----- D�finition des getters et setters ------

	// ----- D�finition des m�thodes ------
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


<?php

class WebServices_Photos extends WebServices_WebService
{
	// ----- Définition des attributs -----

	// ----- Définition des getters et setters ------

	// ----- Définition des méthodes ------
	public static function getAllPhotos(){
		
		$liste_photos = array();
		$liste_photos[1]['_id_photo'] = 1;	
		$liste_photos[1]['_titre'] = 'titre_photo_1';	
		$liste_photos[1]['_url_photo'] = '/images/url_photo_1';	
		$liste_photos[1]['_id_annonce'] = 1;	
		
		$liste_photos[2]['_id_photo'] = 2;	
		$liste_photos[2]['_titre'] = 'titre_photo_2';	
		$liste_photos[2]['_url_photo'] = '/images/url_photo_2';	
		$liste_photos[2]['_id_annonce'] = 1;	
		
		$liste_photos[3]['_id_photo'] = 3;	
		$liste_photos[3]['_titre'] = 'titre_photo_3';	
		$liste_photos[3]['_url_photo'] = '/images/url_photo_3';	
		$liste_photos[3]['_id_annonce'] = 1;	
		
		$liste_photos[4]['_id_photo'] = 4;	
		$liste_photos[4]['_titre'] = 'titre_photo_4';	
		$liste_photos[4]['_url_photo'] = '/images/url_photo_4';	
		$liste_photos[4]['_id_annonce'] = 2;	
		
		$liste_photos[5]['_id_photo'] = 5;	
		$liste_photos[5]['_titre'] = 'titre_photo_5';	
		$liste_photos[5]['_url_photo'] = '/images/url_photo_5';	
		$liste_photos[5]['_id_annonce'] = 2;	

		return $liste_photos;
	}
	
	public static function getPhotosByIdAnnonce($id){
		$liste = self::getAllPhotos();
		$liste_photos = array();
		foreach ($liste as $item){
			if ($item['_id_annonce'] == $id){
				$liste_photos[] = $item;
			}	
		}
		return $liste_photos;
		
	}
	
}


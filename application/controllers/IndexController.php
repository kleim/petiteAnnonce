<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
		$loginForm = null;
		if(isset($_GET['logout'])){
			Zend_Session::namespaceUnset('user');
		}
		if(!Zend_Session::namespaceGet('user')){
			$loginForm = new Application_Form_LoginForm();
			if ($this->getRequest()->isPost()) {
				if ($loginForm->isValid($_POST)) {
					$auth = new Application_Model_Authentification_Authentification($_POST['pseudo'],$_POST['mdp']); 
					$auth->setSession();
				} else {
					$loginForm->populate($_POST);
				}
			}
		}
		$this->view->loginForm = $loginForm;
    }

    public function indexAction()
    {
        
    }
	
	public function annoncesAction()
	{
		$liste_annonces = Application_Model_Annonce::getAllAnnonces();
		if (!$liste_annonces){
			throw new Zend_Controller_Action_Exception('Erreur de données', 500);
		}else{
			$page = Zend_Paginator::factory($liste_annonces);
			$page->setCurrentPageNumber($this->_getParam('page'));
			$page->setItemCountPerPage(3);
			$this->view->liste_annonces = $page;
		}
	}
	
	public function annonceAction()
	{
		if (!isset($_GET["id"])){
			throw new Zend_Controller_Action_Exception('Id manquant', 404);
		}else{
			$id = Application_Model_Validations_ValidationParams::validateId($_GET);
			$annonce = Application_Model_Annonce::getAnnonceById($id);
			if (!$annonce){
				throw new Zend_Controller_Action_Exception('Erreur de données', 500);
			}else{
				$this->view->annonce = $annonce;
			}
		}
	}

	public function annonceursAction()
	{
		if (isset($_GET["page"])){
			$page = $_GET["page"];
		}else{
			$page = 1;
		}
		
		$listeAnnonceurs = Application_Model_Annonceur::getAllAnnonceurs($page,5);
		
		if (!$listeAnnonceurs){
			throw new Zend_Controller_Action_Exception('Page inexistante', 404);
		}else{
			$this->view->listeAnnonceurs = Application_Model_Annonceur::getAllAnnonceurs($page,5);
		}
	}
	
	public function annonceurAction()
	{
		if (!isset($_GET["id"])){
			throw new Zend_Controller_Action_Exception('Id manquant', 404);
		}else{
			$id = Application_Model_Validations_ValidationParams::validateId($_GET);
			$annonceur = Application_Model_Annonceur::getAnnonceurById($id);
			if (!$annonceur){
				throw new Zend_Controller_Action_Exception('Erreur de données', 500);
			}else{
				$this->view->annonceur = $annonceur;
			}
		}
	}
	
	public function profilAction()
	{
	
	}
	
	public function inscriptionAction()
	{
		$iForm = new Application_Form_InscriptionForm();
		$this->view->iForm = $iForm;
	}
	
	public function administrationAction()
	{
	
	}
	
	public function mesfavorisAction()
	{
	
	}
	
	public function mesannoncesAction()
	{
	
	}
	
	public function ajoutannonceAction()
	{
	
	}
	
	public function modifierannonceAction()
	{
	
	}
	
	public function loginAction()
	{
		
	}
	
	public function logoutAction()
	{
		
		$loginForm = new Application_Form_LoginForm();
		$this->view->loginForm = $loginForm;
	}
	
	public function testAction()
	{
		//$requete = new Application_Model_WebServices_Regions;
		//$this->view->test = $requete->getListeRegions();
		
		// $requete = new Application_Model_WebServices_Region;
		// $this->view->test = $requete->getRegionById(12);
		
		// $requete = new Application_Model_WebServices_Departements;
		// $this->view->test = $requete->getListeDepartements();
		
		// $requete = new Application_Model_WebServices_Departement;
		// $this->view->test = $requete->getDepartementById(85);
		
		// $requete = new Application_Model_WebServices_Villes;
		// $this->view->test = $requete->getListeVillesSimplified();
		
		// $requete = new Application_Model_WebServices_Ville;
		// $this->view->test = $requete->getVilleById(120000000);
		
		// $requete = new Application_Model_WebServices_Types;
		// $this->view->test = $requete->getListeTypes();
		
		// $requete = new Application_Model_WebServices_Type;
		// $this->view->test = $requete->getTypeById(12);
		
		// $requete = new Application_Model_WebServices_Categories;
		// $this->view->test = $requete->getListeCategories();
		
		$requete = new Application_Model_WebServices_Categorie;
		$this->view->test = $requete->getCategorieById(2);


		//$this->view->test = Application_Model_Photo::getPhotosByIdAnnonce(1);

        //$phpFunctions = get_defined_functions();

        // $page = Zend_Paginator::factory(array_shift($phpFunctions));
        // $page->setCurrentPageNumber($this->_getParam('page'));
        // $page->setItemCountPerPage(30);
        // $this->view->items = $page;
		
		// $requete = new Application_Model_WebServices_Annonces;
		// $this->view->liste_annonces = $requete->getListeAnnonces();
		
	}
}






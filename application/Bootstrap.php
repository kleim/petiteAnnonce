<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function run()
    {
		Zend_Session::start();
        // Cela permet d'avoir le fichier de configuration disponible depuis n'importe ou dans l'application.
        Zend_Registry::set('config', new Zend_Config($this->getOptions()));
		Zend_Registry::set('baseurl', new Zend_Config($this->getOptions('baseurl')));
		// ------------------------------ PAGINATOR --------------------------
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('placeholders/pagination.phtml');
        parent::run();
    }

}


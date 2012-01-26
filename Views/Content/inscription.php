<?php
echo "<h2>Page d'inscription</h2>";

if ($inscription_ok){
   echo "Inscription réussie";
}else{
   echo $inscriptionForm->render(new Zend_View());
}





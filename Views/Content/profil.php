<?php
echo "<h2>Page du profil de ".$profilInfo."</h2>";

if ($modification){
    
    echo $modificationForm->render(new Zend_View());
   
}else{
   
    if ($modification_ok){
        echo '<br/>Les modfications ont été enregistrées.<br/>';
    }
    
    echo var_dump($profilInfo);
   
    echo '<br/><a href="'.$baseUrl.'/index.php/profil?modif=true">Modifier mon profil</a>';
}


<div id="header">
	<span class="dev">Header</span>
<?php
if(!Zend_Session::namespaceGet('user')){
	if (isset($loginForm)){
            echo $loginForm->render(new Zend_View());
        }
        if (isset($loginError)){
            echo $loginError;
        }
}else{
	$session = Zend_Session::namespaceGet('user');
	echo '<br/>'.$session['annonceur'].' : Connecté<br/><a href="'.$baseUrl.'/index.php/logout?logout">Déconnexion</a>';
}
?>        
</div>
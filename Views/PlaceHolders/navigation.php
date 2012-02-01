<?php

?>
<div id="nav">
	<span class="dev">Menu</span>
	<ul>
		<li><a href="<?php echo $baseUrl ?>/index.php/accueil">Accueil</a></li>
		<li><a href="<?php echo $baseUrl ?>/index.php/annonces">Annonces</a></li>
		<li><a href="<?php echo $baseUrl ?>/index.php/annonceurs">Annonceurs</a></li>
		
		<?php
		if(!Zend_Session::namespaceGet('user')){
		?>
			<li><a href="<?php echo $baseUrl ?>/index.php/inscription">Inscription</a></li>
		<?php 
		}else{
		?>
			<li><a href="<?php echo $baseUrl ?>/index.php/profil">Mon profil</a></li>
			<li><a href="<?php echo $baseUrl ?>/index.php/mesAnnonces">Mes annonces</a></li>
			<li><a href="<?php echo $baseUrl ?>/index.php/mesFavoris">Mes favoris</a></li>
		<?php 
			$session = Zend_Session::namespaceGet('user');
			if ($session['annonceur']->getStatut() == 'admin'){
		?>
				<li><a href="<?php echo $baseUrl ?>/index.php/administration">Administration</a></li>
		<?php
			}
		}
		?>
	</ul>
</div>
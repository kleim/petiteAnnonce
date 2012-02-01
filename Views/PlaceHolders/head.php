<?php
global $baseUrl;
//CSS par défaut
$css = $baseUrl.'/Style/Style.css';
$title = "Titre de la page";

switch ($page) {
	case "accueil":
		$title = "Titre de la page d'accueil";
		break;
        case "erreur":
		$title = "500 - erreur interne";
                break;
	case "404":
		$title = "404 - page non trouvée";
                break;
}
?>
	<head>
		<title><?php echo $title ?></title>

		<!-- Meta Tags -->
		<meta
			http-equiv="content-type"
			content="application/xhtml+xml; charset=utf-8"
		/>
		<meta name="robots" content="index, follow" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo $css ?>" media="screen,projection" type="text/css" />
	</head>
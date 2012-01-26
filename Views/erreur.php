<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
>
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<?php
        $page = "erreur";
	include("Views/PlaceHolders/head.php");
	?>
	
	<body>
		<div id="container">

			<?php
			include("Views/PlaceHolders/header.php");
			include("Views/PlaceHolders/navigation.php");
			include("Views/PlaceHolders/sidebar.php");
			?>

			<div id="content">
				<?php
				echo $errorMessage;
				?>
			</div>

			<?php 
			include("Views/PlaceHolders/footer.php"); 
			?>

		</div>
	</body>
	
</html>
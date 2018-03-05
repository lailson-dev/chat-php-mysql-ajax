<?php 
	session_start();
	include_once('settings/settings.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Chat em PHP, MySQL e Ajax - Lailson Conceição</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>
<body>
	<?php if($showName) { ?>

	<p>Olá, <code><?= $actualName; ?></code>. Seja bem vindo!</p>
	<?php } ?>

	<div class="row">
		<div class="col col-md-6 offset-md-3 mt-3">
			<?php 

				$dir = "pages/";
				$ext = ".php";

				if(isset($_GET['page']))
					$page = ($_GET['page']);
				else
					$page = "home";

				if(file_exists( $dir . $page . $ext )) 
					include( $dir . $page . $ext );
				else
					echo "404! Page not found!";

			 ?>
		</div>
	</div>

	

	<script src="js/jquery-3.2.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
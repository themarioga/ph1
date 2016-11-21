<?php
	session_start();
	if(isset($_SESSION["remember"])==true){
		header("location: principal.php");
	}
	if(isset($_GET["q"]) && $_GET["q"]=="login"){
		$pagina="l";
	}else if(isset($_GET["q"]) && $_GET["q"]=="registro"){
		$pagina="r";
	}else{
		$pagina="l";
	}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
		<?php
			if($pagina=="l"){
		?>
			<title>WePic - Control de acceso</title>

		<?php
			}else if($pagina=="r"){
		?>
			<title>WePic - Registro</title>
		<?php
			}
		?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"/>
        <link href="css/outside-style.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="css/outside-style-print.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="css/style-accesible.css" rel="alternate stylesheet" type="text/css" title="Accesible"/> 
    </head>
    <body>
		<nav>
			<div class="left"><img src="images/logo.png" alt="Logo"/></div>
			<div class="right">
				<label for="search" class="hide">Buscar</label>
				<input type="text" placeholder="Buscar" id="search"/>
 				<a href="resultadobusqueda.php" class="search-icon"><i class="material-icons">search</i></a>
				<?php
					if($pagina=="l"){
				?>
					<a href="index.php?q=registro" class="btn"><i class="material-icons lefticon">person_add</i>Regístrate</a>
				<?php
					}else if($pagina=="r"){
				?>
					<a href="index.php?q=login" class="btn"><i class="material-icons lefticon">person_add</i>Conéctate</a>
				<?php
					}
				?>
			</div>
			<div class="clear"></div>
		</nav>
		<?php
			if($pagina=="l"){
				include("includes/login.php");
			}else if($pagina=="r"){
				include("includes/registro.php");
			}
		?>
		<footer>
			WePic ©2016
		</footer>
	</body>
</html>
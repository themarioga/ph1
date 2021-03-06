<?php
	$title = "Detalle de foto";
	$cssfile = "detalle";
	include("includes/head.php");
	if(isset($_SESSION["remember"])==false){
		header("location: index.php");
	}
	if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
		$id = $db->real_escape_string($_GET["id"]);
		if($id>=0){
			$response = $db->query("SELECT id, titulo, descripcion, fecha, idPais, idAlbum, ruta, (SELECT titulo FROM albumes WHERE id=idAlbum) as nombreAlbum,".
				"(SELECT nombre FROM paises WHERE id=idPais) as nombrePais, ".
				"(SELECT nombre FROM usuarios WHERE id=(SELECT idUsuario FROM albumes WHERE id=idAlbum)) as nombreUsuario, ".
				"(SELECT foto FROM usuarios WHERE id=(SELECT idUsuario FROM albumes WHERE id=idAlbum)) as fotoUsuario, ".
				"(SELECT idUsuario FROM albumes WHERE id=idAlbum) as idUsuario, ".
				"(SELECT titulo FROM albumes WHERE id=idAlbum) as tituloAlbum FROM fotos WHERE id=".$id);
			if (!$response || ($response && !$response->num_rows)) die ("ERROR: no existe esta foto");
			$foto = $response->fetch_array();
			$titulo = $foto["titulo"];
			$ruta = $foto["ruta"];
			$descripcion = $foto["descripcion"];
			$fecha = date("d/m/Y", strtotime($foto["fecha"]));
			$pais = $foto["nombrePais"];
			$id_autor = $foto["idUsuario"];
			$autor = $foto["nombreUsuario"];
			$foto_autor=$foto["fotoUsuario"];
			$tituloAlbum = $foto["tituloAlbum"];
			$idAlbum = $foto["idAlbum"];
		}else{
			$error=true;
		}
	} else die ("ERROR: no existe esta foto");
	include("includes/header.php");
?>
<section>
	<div class="cabecera">
		<h1><?php echo $titulo; ?></h1>
	</div>
	<article>
		<div class="image">
			<img src="uploads/<?php echo ($ruta) ? $ruta : "user.png"; ?>" alt="Foto"/>
			<div class="info">
				<p class="descripcion"><?php echo $descripcion;?></p>
				<p><?php echo $fecha; ?> - <?php echo $pais; ?></p>
				<p>Album: <a href="veralbum.php?id=<?php echo $idAlbum; ?>"><b><?php echo $tituloAlbum; ?></b></a></p>
				<p class="right author"><a href="detalleusuario.php?id=<?php echo $id_autor; ?>">
					<img src="uploads/<?php echo ($foto_autor) ? "thumb_".$foto_autor : "user.png"; ?>" alt="Perfil"/><b><?php echo $autor; ?></b></a>
				</p>
			</div>
		</div>
		<div class="clear"></div>
	</article>
</section>
<?php
	include("includes/footer.php");
?>

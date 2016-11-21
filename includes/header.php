<nav>
	<div class="left"><a href="principal.php"><img src="images/logo.png" alt="Logo"/></a></div>
	<div class="right">
		<form method="GET" action="resultadobusqueda.php">
			<label for="search">Buscar</label>
			<input name="search" type="text" placeholder="Buscar" id="search"/>
		</form>
		<a href="resultadobusqueda.php" class="search-icon"><i class="material-icons">search</i></a>
		<a href="buscafoto.php">Búsqueda avanzada</a>
		<div class="profile dropdown"><img src="images/fotoperfil.png" alt="Perfil"/>
			<div class="dropdown-content">
				<p>Hola,XXX</p>
				<a href="perfil.php">Perfil</a>
				<a href="operaciones.php?operacion=logout">Cerrar sesión</a>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</nav>
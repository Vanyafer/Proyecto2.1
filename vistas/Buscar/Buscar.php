
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Inicio.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/masonry.pkgd.min.js"></script>
	<script src="./assets/js/imagesloaded.js"></script>
	<script src="./assets/js/classie.js"></script>
	<script src="./assets/js/AnimOnScroll.js"></script>
	

</head>
<body>	
<form action="Control.php?c=Buscar&a=Buscar" method="POST">
	<input type="text" name="buscar">
	<input type="submit" name="">
</form>

<?php

		 if(isset($_REQUEST['buscar'])){


		 						$palabra = $_REQUEST['buscar'];
		 						echo "<h1>".$palabra."</h1><h3>Usuarios</h3>";


								$buscar = new BuscarControlador();
								$bu = $buscar->BuscarUsuario($palabra);
								foreach ($bu as $b) {
									echo "<p><a href='Control.php?c=Perfiles&a=Perfiles&id=".$b->id_usuario."' id='usuario'>$b->nombre_usuario</a></p>";
								}
?>
<h3>Publicaciones</h3>
<div class="grid effect-3" id="grid">
		<?php
								$bp = $buscar->BuscarPublicacion($palabra);

								foreach ($bp as $publi){
											$art = new ArtistaControlador();
											$a = $art->Artista($publi->id_artista);
											$us = new UsuarioControlador();
											$u = $us->Usuario($a->id_usuario);
											if(isset($publi->imagen)){
           									echo "<li><a ><img src='$publi->imagen' id='$publi->id_publicacion' class='Abrir2' idu='$a->id_usuario' name='$u->nombre_usuario'></a></li>";
											}else{
												echo "<li class='Abrir2 texto' name='$u->nombre_usuario' id='$publi->id_publicacion' idu='$a->id_usuario'><a ><textbox  >$publi->contenido </textbox></a></li>";
											}	
											
								}
							}
        ?>
</div>

</body>
</html>
<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
		
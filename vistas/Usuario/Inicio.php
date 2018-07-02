	
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/InicioUsuario.css"/>
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/imagesloaded.js"></script>
	<script src="./assets/js/classie.js"></script>
	<script src="./assets/js/AnimOnScroll.js"></script>
	
</head>
<div class="masonry-layout" id="gallery">
	<?php

		$ini = new InicioControlador();
		$publicacion = $ini->InicioUsuario();
		foreach ($publicacion as $publi){

			$art = new ArtistaControlador();
			$a = $art->Artista($publi->id_artista);
			$us = new UsuarioControlador();
			$u = $us->Usuario($a->id_usuario);
			if(isset($publi->imagen)){ ?>

				<li class="gallery-item">
					<a>
						<img src="<?php echo $publi->imagen;?>" class="Abrir2" name="<?php echo $u->nombre_usuario;?>" id="<?php echo $publi->id_publicacion;?>" idu="<?php echo $a->id_usuario;?>">
					</a>
				</li>		

			<?php } else { ?>

				<li class="Abrir2 gallery-item" name="<?php echo $u->nombre_usuario;?>" id="<?php echo $publi->id_publicacion;?>" idu="<?php echo $a->id_usuario;?>">
					<a>
						<p class="post-item"><?php echo $publi->contenido;?></p>
					</a>
				</li>
	
			<?php }	
		}
	?>

</div>


<script src="assets/js/app/masonry.js"></script>
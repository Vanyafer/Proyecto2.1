
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Inicio.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Publicacion.css">
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/masonry.pkgd.min.js"></script>
	<script src="./assets/js/imagesloaded.js"></script>
	<script src="./assets/js/classie.js"></script>
	<script src="./assets/js/AnimOnScroll.js"></script>
	

</head>
<body>		
<div class="home">
	<div class="masonry-layout" id="gallery">
		<?php
			foreach ($result->publicacion as $publi){

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

					<li class="Abrir2" name="<?php echo $u->nombre_usuario;?>" id="<?php $publi->id_publicacion;?>" idu="<?php echo $a->id_usuario;?>">
						<a>
							<textarea><?php $publi->contenido;?></textarea>
						</a>
					</li>

				<?php }	
			}
		?>
	</div>
	<div class="users">
		<ul class="collection">
			<li class="header">Usuarios Recomendados</li>
			<li class="item"></li>
		</ul>
	</div>
</div>
</body>
</html>
<script src="assets/js/app/masonry.js"></script>
		
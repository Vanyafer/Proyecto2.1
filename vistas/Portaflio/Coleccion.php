
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
<div class="masonry-layout" id="gallery">
	<?php
		$id_coleccion = $_GET['id'];
		$col = new ColecionControlador();
		$co = $col->ImagenesColeccion($id_coleccion);
		foreach ($co as $c){

			 ?>
				<li class="gallery-item">
					<a>
						<img src="<?php echo $c->imagen;?>" class="Abrir2">
					</a>
				</li>		
<?php
		}
	?>
</div>
</body>
</html>
<script src="assets/js/app/masonry.js"></script>
		
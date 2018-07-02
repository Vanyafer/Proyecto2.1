<?php 
		$id_coleccion = $_GET['id']; ?>
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
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay2").fadeOut(400);
	    });
	    $(".AbrirC").click(function(){
	        $(".overlay2").fadeIn(400);
	    });
	    $(".Abrir22").click(function(){
		    	img=$(this).attr("src");
		    	id = $(this).attr("id");
		    	$('#imagen').attr("src",img);
		    	h = "Control.php?c=Coleccion&a=EliminarImagen&id_c=<?php echo $id_coleccion?>&id_i="+id;
		    	$('#dir').attr("href",h);
		        $(".overlay3").fadeIn(400);
		    });
	     $(".AbrirP").click(function(){
	        $(".overlay").fadeIn(400);
	    });
});
</script>

<a class="AbrirP">Editar descripcion</a><br>
<a class="AbrirC">Agregar imagen</a><br> 

<a href="Control.php?c=Coleccion&a=EliminarColeccion&id=<?php echo $id_coleccion?>">Eliminar coleccion</a><br>
<div class="masonry-layout" id="gallery">
	<?php
		$col = new ColeccionControlador();
		$co = $col->ImagenesColeccion($id_coleccion);
		foreach ($co as $c){

			 ?>
				<li class="gallery-item">
					<a>
						<img src="<?php echo $c->imagen;?>" id="<?php echo $c->id_imagencoleccion;?>" class="Abrir22">
					</a>
				</li>		
<?php
		}
	?>
</div>
</body>
</html>
<script src="assets/js/app/masonry.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="overlay2">
	<?php include "AgregarImagenes.php"; ?>

</div>
<div class="overlay3">
<div class="Pop">
	
	<img src="" id="imagen">
	<a href="" id="dir">Eliminar Imagen</a>
</div>
</div>
<div class="overlay">
<div class="Pop" >
	<h1>Cambiar portafolio</h1>
	<fieldset>
		<form action="Control.php?c=Coleccion&a=UpdateColeccion" method="POST">
			<input type="text" name="desc" id="desc">
			<input type="hidden" name="id_coleccion" value="<?php echo $id_coleccion; ?>">
			<input type="submit" name="Aceptar" value="Subir">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>
</div>
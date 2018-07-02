<?php 
		$id_coleccion = $_GET['id']; ?>
<html>
<head>
	<title>Inicio</title>
	
	<script src="./assets/js/modernizr.custom.js"></script>
	<script src="./assets/js/masonry.pkgd.min.js"></script>
	<script src="./assets/js/imagesloaded.js"></script>
	<script src="./assets/js/classie.js"></script>
	<script src="./assets/js/AnimOnScroll.js"></script>
	

</head>
<body>		
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".AbrirC").click(function(){
	        $(".add").fadeIn(400).css('display','flex');
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
	        $(".updateColection").fadeIn(400).css('display','flex');
	    });
		$(window).click(e => {
			if(e.target == $('.updateColection')[0]) {
				$('.updateColection').fadeOut();
			}
			if(e.target == $('.add')[0]) {
				$('.add').fadeOut();
			}
		})
});
</script>

<div class="container keep">
	<div class="space-between margin-top">
		<a class="btn border AbrirP">
			Editar descripción
			<i class="fas fa-pencil-alt"></i>
		</a>
		<a class="btn border AbrirC">
			Nueva Imagen
			<i class="fas fa-plus"></i>
		</a>
	</div>
	<h1 class="margin-top">Colección</h1>
</div>

<div class="container keep">
	<div class="right">
		<a class="btn border" href="Control.php?c=Coleccion&a=EliminarColeccion&id=<?php echo $id_coleccion?>">
			Eliminar coleccion
			<i class="fas fa-trash-alt"></i>
		</a>
	</div>
</div>

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

<?php include "AgregarImagenes.php"; ?>

<div class="overlay3">
<div class="Pop">
	
	<img src="" id="imagen">
	<a href="" id="dir">Eliminar Imagen</a>
</div>
</div>

<div class="modal updateColection">
	<div class="body publicacion">
		<form action="Control.php?c=Coleccion&a=UpdateColeccion" method="POST">
			<h1 class="title">Hola</h1>
			<div class="grid columns-1">
				<input type="hidden" name="id_coleccion" value="<?php echo $id_coleccion; ?>">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-font"></i>
						<label for="desc">Descripción:</label>
					</div>
					<textarea type="text" name="desc" id="desc"></textarea>
				</div>
				<div class="right">
					<button type="submit" class="btn border">
						Aceptar
						<i class="fas fa-pencil-alt"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

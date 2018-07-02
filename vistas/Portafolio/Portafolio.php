<?php 
	$id_portafolio =  $_GET['id'];
	$portafolio = new PortafolioControlador();
	$coleccion = new Coleccioncontrolador();
	$co = $coleccion->Colecciones($id_portafolio);
	
?>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	    });
	    $(".AbrirC").click(function(){
	        $(".add").fadeIn(400).css('display','flex');
	    });
	    $(".AbrirP").click(function(){
	        $(".update").fadeIn(400).css('display','flex');
	    });
		$(window).click(e => {
			if(e.target == $('.update')[0]) {
				$('.update').fadeOut(400);
			} else if(e.target == $('.add')[0]) {
				$('.add').fadeOut(400);
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
			Nueva Colección
			<i class="fas fa-plus"></i>
		</a>
	</div>
	<h1 class="margin-top">Portafolio</h1>
</div>

<div class="hexagons">
	<?php foreach ($co as $c) { ?>
		<div class="hexagon--item">
			<a class="img-hexagon" style="background-image: url(https://images.unsplash.com/photo-1417436026361-a033044d901f?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;w=1080&amp;fit=max&amp;s=faa4e192f33e0d6b7ce0e54f15140e42)" href="Control.php?c=Coleccion&a=Coleccion&id=<?php echo $c->id_coleccion;?>"></a>
			<div class="content-hexagon">
				<h2><?php echo $c->descripcion;?></h2>
			</div>
		</div>
	<?php } ?>
</div>

 <?php include "AgregarColeccion.php"; ?>

<div class="modal update">
	<div class="body publicacion">
		<form action="Control.php?c=Portafolio&a=Update" method="POST">
			<h1 class="title">Hola</h1>
			<div class="grid columns-1">
				<input type="hidden" name="id_portafolio" value="<?php echo $id_portafolio; ?>">
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
						<i class="fas fa-pen-alt"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

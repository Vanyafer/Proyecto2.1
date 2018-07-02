<title>Reto</title>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Abrir1").click(function(){
	        $('.challenge').fadeIn(400).css('display', 'flex')
	    });
		$(window).click(e => {
			if(e.target == $('.challenge')[0]) {
				$('.challenge').fadeOut(400);
			}
		})
});
</script>
		
<?php 
	$re = new RetoControlador();
	$r = $re->Reto();

?>

<div class="container">
	<div class="card">
		<h1 class="header">Reto</h1>
		<div class="body">
			<div class="txt">
				<i class="fas fa-font"></i>
				<p>Descripción: <?php echo $r->descripcion; ?></p>
			</div>
			<div class="txt">
				<i class="fas fa-clock"></i>
				<p>Úlitmo día: <?php echo $r->fecha; ?></p>
			</div>
			<div class="right">
				<a href="" class="btn border">
					Apoyo Visual
					<i class="fas fa-eye"></i>
				</a>
				<div class="btn border Abrir1">
					Subir
					<i class="fas fa-upload"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="card">
		<h1 class="header">Retos Pendientes</h1>
		<div class="body">
			<div class="txt">
				No hay retos pendientes
			</div>
		</div>
	</div>
	<div class="card">
		<h1 class="header">Retos Completados</h1>
		<div class="body">
			<div class="txt">
				Aún no hay retos completados
			</div>
		</div>
	</div>
</div>

<div class="modal challenge">

	<div class="body publicacion">

		<form action="Control.php?c=Reto&a=SubirReto" method="POST" enctype="multipart/form-data">

			<h1 class="title">Subir Archivos</h1>
			<div class="grid columns-1">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-file"></i>
						<label for="image">Imagen:</label>
					</div>
					<input type="file" name="image" id="image">
				</div>
				<div class="right">
					<button type="submit" class="btn border">
						Subir
						<i class="fas fa-check"></i>
					</button>
				</div>
			</div>
			<input type="hidden" name="id_reto" value="<?php echo $r->id_reto; ?>">
		</form>
	</div>

</div>

<div class="Pop">
	<h1>Subir</h1>
	<fieldset>
		<form enctype="multipart/form-data" action="Subir.php" method="POST">
			<input type="hidden" name="id_reto" value="<?php echo $r->id_reto; ?>">
			<input type="file" name="image">
			<input type="submit" name="Aceptar" value="Subir">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>
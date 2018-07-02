<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="Pop">
	<h1>Publicar</h1>
	<fieldset>
		<form enctype="multipart/form-data" action="Control.php?c=Colecciono&a=AgregarImagen" method="POST">
			<input type="hidden" name="id_coleccion" value="<?php echo $_GET['id_coleccion'] ?>">
			<input type="file" name="image" accept=".png, .jpg, .jpeg" multiple>

			<input type="submit" name="">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>


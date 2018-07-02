<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="Pop" >
	<h1>Agregar coleccion</h1>
	<fieldset>
		<form action="Control.php?c=Coleccion&a=AgregarColeccion" method="POST">
			<input type="text" name="des" id="des">
			<input type="hidden" name="id_portafolio" value="<?php echo $id_portafolio; ?>">
			<input type="submit" name="Aceptar" value="Subir">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>
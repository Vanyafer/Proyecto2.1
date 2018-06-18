<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="Pop">
	<h1>Publicar</h1>
	<fieldset>
		<form enctype="multipart/form-data" action="Control.php?c=Inicio&a=Publicar" method="POST">
			<input type="text" name="des" id="des">
			<input type="file" name="image">
			<p>Tipo de usuario:</p>
							<p><input type="radio" name="tipoP" value="0" checked> Publico </p>
							<p><input type="radio" name="tipoP" value="1"> Solo amigos </p>
							<p> <input type="checkbox" name="edad" id="edad"> +18 </p>
							<p id="Terminos"></p>
							<input type="submit" name="Aceptar" value="Subir">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>


<div class="modal add">

	<div class="body publicacion">

		<form action="Control.php?c=Coleccion&a=AgregarImagen" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_coleccion" value="<?php echo $_GET['id'] ?>">
			<h1 class="title">Agregar Imagen</h1>
			<div class="grid columns-1">
				<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-file"></i>
						<label for="image">Imagen:</label>
					</div>
					<input type="file" name="image[]" id="image" multiple>
				</div>
				<div class="right">
					<button type="submit" class="btn border">
						Aceptar
						<i class="fas fa-check"></i>
					</button>
				</div>
			</div>
		</form>

	</div>

</div>
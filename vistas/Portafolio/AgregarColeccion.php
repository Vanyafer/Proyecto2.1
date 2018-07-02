<div class="modal add">
	
	<div class="body publicacion">
		
		<form action="Control.php?c=Coleccion&a=AgregarColeccion" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id_portafolio" value="<?php echo $id_portafolio; ?>">
		<h1 class="title">Agregar Colección</h1>
		<div class="grid columns-1">
			<div class="input-group">
					<div class="placeholder">
						<i class="fas fa-font"></i>
						<label for="des">Descripción:</label>
					</div>
					<textarea name="des" id="des"></textarea>
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
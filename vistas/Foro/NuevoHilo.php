

<div class="full-screen flex">

	<form action="Control.php?c=Foro&a=NuevoHilo" method="POST" class="medium-form grid columns-1">
		<h1 class="title">Crear Foro</h1>
		<div class="input-group">
			<div class="placeholder">
				<i class="fas fa-font"></i>
				<label for="titulo">Título:</label>
			</div>
			<input type="text" name="titulo" id="titulo">
		</div>
		<div class="input-group">
			<div class="placeholder">
				<i class="fas fa-key"></i>
				<label for="descripcion">Descripción:</label>
			</div>
			<textarea name="descripcion" id="descripcion" cols="5" rows="10"></textarea>
		</div>
		<div class="input-group">
			<div class="placeholder">
				<i class="fas fa-cogs"></i>
				<label>Sub-Foro:</label>
			</div>
			<div class="radio-button">
				<input type="radio" name="tipoF" id="tipoF1" value="1" checked>
				<label for="tipoF1">
					<div class="circle"></div>
					Ideas
				</label>
			</div>
			<div class="radio-button">
				<input type="radio" name="tipoF" value="2" id="tipoF2">
				<label for="tipoF2">
					<div class="circle"></div>
					Objetos
				</label>
			</div>
		</div>
		<div class="right margin-top">
			<button class="btn border">
				<span>Crear</span>
				<i class="fa fa-angle-double-right"></i>
			</button>
		</div>
	</form>

</div>

<?php
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>  
				document.getElementById('tipoF2').style.visibility='visible';
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>document.getElementById('tipoF2').style.display='none';</script>";
			}
	?>
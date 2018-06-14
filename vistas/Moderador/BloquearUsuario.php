<?php 
	$id_usuario = $_GET['id_usuario']; 
	$Us = new UsuarioControlador();
	$u = $Us->Usuario($id_usuario);
?>
<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="Pop">
	<h1>Bloquear</h1>
	<div><h3>Nombre usuario: </label><?php echo $u->nombre_usuario ?></h3></div>
	<form action="Control.php?c=Moderador&a=BloquearUsuario" method="POST">
		<br>
		<input type="radio" name="fecha" value="1"><label>1 dias</label><br>
		<input type="radio" name="fecha" value="7"><label>1 semana</label><br>
		<input type="radio" name="fecha" value="31"><label>1 mes</label><br>
		<input type="radio" name="fecha" value="0"><label>Personalizado</label><br><br>
		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
		<label>Fecha de fin:</label>
		<input type="date" name="fin" id="fin" value="2018-06-11" min="2018-06-11">
		<input type="submit" name="" value="Aceptar">
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById('fin').disabled = true;
		$("input:radio[name=fecha]").click(function () {	 
			x = $('input:radio[name=fecha]:checked').val();
			if(x == 0){
				document.getElementById('fin').disabled = false;
			}else{
				document.getElementById('fin').disabled = true;
			}
			
		});
	});
</script>
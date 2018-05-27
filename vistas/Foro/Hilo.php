<?php 
$id_forohilo = $_GET['id'];
$Hil = new ForoControlador();
$hi = $Hil->Hilo($id_hilo);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
</head>
<body>
	<div class="Foros">
	<p><?php echo $hi->titulo; ?></p>
	<table>
	<tr>
	<th>Descripcion</th>
	<th>Usuario</th>
	</tr>
	<tr>
	<td class="izq">'<?php echo $hi->titulo; ?></td>
	<td class="der">'<?php echo $hi->id_usuario; ?></td>
	</tr>
	</table>
	</div>

	<div class="Foros">
	<?php
		$Res = new ForoControlador();
  		$re = $Res->Respuestas($id_forohilo]); 

  		echo '<table> 
  <tr>
  <th class="cinta">Usuario</th>
  <th class="cinta">Respuesta</th>
  </tr>';

  foreach ($re as $r) {
    
    $us = new UsuarioControlador();
    $u = $us->Usuario($r->id_usuario);
  
    echo "<tr>";
    echo'<td class="izq">'; 
        echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id=' . $r->id_usuario. '">$u->nombre_usuario</a></h3>';
    echo "</td>";
    echo '<td class="der">';
        echo '<h3>$r->contenido</h3>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
	 ?>
	</div>

	<div  class="Foros">
		<form onSubmit="Enviar(); return false" id="RespuestaN">
		<input type="hidden" name="id_respuesta" id="id_respuesta">
		<input type="hidden" id="id_forohilo" name="id_forohilo" value="<?php echo $id_forohilo; ?>">
		<input type="text" name="contenido" id="contenido">
		<input type="submit" name="" value="Responder">
		</form>

	<?php 
		echo '<a href="Control.php?c=Foro&a=AgregarFavs&id=$id_forohilo">Agregar a Favoritos</p>';
	 ?>
	 </div>
</body>
</html>

<script type="text/javascript">
	function Enviar(){
		
			$.ajax({

		    		url:'usuario.php?c=Foro&a=Responder',
		    		method:'POST',
		    		data: $("#RespuestaN").serialize(),
		    		 success: function(res){
			    		 $.ajax({
				    		url:'Control.php?c=Foro&a=Hilo&id=',
				    		method:'POST',
				    		data: $("#idp").serialize(),
				    		 success: function(res){
				    		 	$(".Imagen").html(res);
				    		 }	
			    		});
		    		 	$("#Respuesta").val("");
		    		 }	
		    		});
}
</script>

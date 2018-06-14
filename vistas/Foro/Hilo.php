<?php 
	$id_forohilo = $_GET['id'];
	$Hil = new ForoControlador();
	$hi = $Hil->Hilo();
	$us = new UsuarioControlador();
	$u = $us->Usuario($hi->id_usuario);
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
	<td class="izq"><?php echo $hi->contenido; ?></td>
	<td class="der"><?php echo $u->nombre_usuario; ?></td>
	</tr>
	</table>
	</div>

	<div class="Foros">
	<?php
		$Res = new ForoRespuestaControlador();
  		$re = $Res->Respuestas($id_forohilo); 

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
        echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id=' . $r->id_usuario. '">'.$u->nombre_usuario.'</a></h3>';
    echo "</td>";
    echo '<td class="der">';
        echo '<h3>'.$r->contenido.'</h3>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
	 ?>
	</div>

	<div  class="Foros">
		<form onSubmit="Enviar(); return false" id="RespuestaN">
		<input type="hidden" id="id_forohilo" name="id_forohilo" value="<?php echo $id_forohilo; ?>">
		<input type="text" name="contenido" id="contenido">
		<input type="submit" name="" value="Responder">
		</form>

	<a href="Control.php?c=Foro&a=AgregarFavs&id=<?php echo $id_forohilo; ?>" id='fav'>Agregar a Favoritos</a>
	<a href="" id="Accion"></a>
	 </div>
</body>
</html>

<script type="text/javascript">
	function Enviar(){
		
			$.ajax({

		    		url:'usuario.php?c=ForoRespuesta&a=Responder',
		    		method:'POST',
		    		data: $("#RespuestaN").serialize(),
		    		 success: function(res){
			    		location.reload();
		    		 }	
		    		});
}
</script>
<?php 
	$fav = $Hil->ConfirmarFavs($_GET['id']);
	if($fav == 1){
		echo "<script>$('#fav').html('Eliminar de favoritos'); $('#fav').attr('href','Control.php?c=Foro&a=EliminarFavs&id=".$id_forohilo."');</script>";
	}
	if($hi->id_usuario == $_SESSION['id_usuario']){

			echo "<script>$('#Accion').html('Eliminar foro'); $('#Accion').attr('href','Control.php?c=Foro&a=EliminarForoUsuario&id_f=".$id_forohilo."');</script>";
	}
?>
<?php
include("conexion.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reto</title>
<link rel="stylesheet" type="text/css" href="css/Reto.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/icomoon/style.css">
    	<script src="js/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay1").fadeOut(400);
	         $(".popup1").fadeOut(400);
	    });
	    $(".Abrir1").click(function(){
	        $(".overlay1").fadeIn(400);
	        $(".popup1").fadeIn(400);
	    });
});
</script>
</head>
<body>		
<?php include "BarraNavegacion.php";
$consulta=mysqli_query($conexion,"SELECT * FROM retos");
$result=mysqli_fetch_array($consulta);
$reto = $result['id_reto'];
$des = $result['descripcion'];
$fecha = $result['fecha'];


$artista = $_SESSION['artista'];

$consulta=mysqli_query($conexion,"SELECT * FROM retos_aceptados where id_artista = $artista and id_reto = $reto");
if(mysqli_num_rows($consulta)>0){
	echo "<script Language='JavaScript'>
				$(document).ready(function(){	
					document.getElementById('subir').style.display='none';
				});
		</script>";

	$result=mysqli_fetch_array($consulta);
	$aceptado = $result['id_aceptado'];
	$consulta=mysqli_query($conexion,"SELECT * FROM imagen_reto where id_aceptado= $aceptado");
	if($consulta){	
		$result=mysqli_fetch_array($consulta);
	}


}

 ?>
<div class="Reto">
	<h1>Reto</h1>
	<div class="Fila">
		<div class="Descripcion"><?php echo $des; ?></div>
		<div class="Subir"  id="subir" ><a class="Abrir1">Subir</a></div>
	</div>
	<div class="Fila">
		<div class="Dias"><p>Ultimo dia: <?php echo $fecha; ?></p></div>
		<div class="Apoyo"><a href="">ApoyoVisual</a></div>
		<!--?php 	echo "<img src=".$result1['imagen'].">"; ?-->
	</div>
	
</div>
<div class="Retos">
	<p>Retos Pedientes</p>
	<div class="ListaR">
		<ul>
			
		</ul>
	</div>
</div>
<div class="Retos">
	<p>Retos Hechos</p>
	<div class="ListaR">
		<ul>
		<?php echo "<img src=".$result['imagen'].">"; ?>
		</ul>
	</div>
</div>

<div class="overlay1">
	<div class="popup1">
		    		<?php include "Subir.php"; ?>
	
</div>
</div>
</body>
</html>
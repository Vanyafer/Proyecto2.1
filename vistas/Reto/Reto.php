
<!DOCTYPE html>
<html>
<head>
	<title>Reto</title>
<link rel="stylesheet" type="text/css" href="./assets/css/Reto.css">
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
<?php 
	$re = new RetoControlador();
	$r = $re->Reto();

?>
<div class="Reto">
	<h1>Reto</h1>
	<div class="Fila">
		<div class="Descripcion"><?php echo $r->descripcion; ?></div>
		<div class="Subir"  id="subir" ><a class="Abrir1">Subir</a></div>
	</div>
	<div class="Fila">
		<div class="Dias"><p>Ultimo dia: <?php echo $r->fecha; ?></p></div>
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
		</ul>
	</div>
</div>

<div class="overlay1">
	<div class="popup1">
		<div class="Pop">
			<h1>Subir</h1>
			<fieldset>
				<form enctype="multipart/form-data" action="Subir.php" method="POST">
					<input type="hidden" name="id_reto" value="<?php echo $id_reto; ?>">
					<input type="file" name="image">
					<input type="submit" name="Aceptar" value="Subir">
				</form>
				<input type="submit" value="Cerrar" class="Close">
			</fieldset>
		</div>
	</div>
</div>
</body>
</html>
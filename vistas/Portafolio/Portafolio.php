<?php 
	$id_portafolio =  $_GET['id'];
	$portafolio = new PortafolioControlador();
	$coleccion = new Coleccioncontrolador();
	$co = $coleccion->Colecciones($id_portafolio);
	
?>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	    });
	    $(".AbrirC").click(function(){
	        $(".overlay2").fadeIn(400);
	    });
	    $(".AbrirP").click(function(){
	        $(".overlay3").fadeIn(400);
	    });
});
</script>
<a class="AbrirP">Editar descripcion</a><br>
<a class="AbrirC">Nueva collecion</a><br>
<?php
	foreach ($co as $c) {
		echo "<a href='Control.php?c=Coleccion&a=Coleccion&id=".$c->id_coleccion."'>".$c->descripcion."</a><br>";
	}
?>

<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
<div class="overlay2">
 <?php include "AgregarColeccion.php"; ?>
</div>
<div class="overlay3">
<div class="Pop" >
	<h1>Cambiar portafolio</h1>
	<fieldset>
		<form action="Control.php?c=Portafolio&a=Update" method="POST">
			<input type="text" name="desc" id="desc">
			<input type="hidden" name="id_portafolio" value="<?php echo $id_portafolio; ?>">
			<input type="submit" name="Aceptar" value="Subir">
		</form>
		<input type="submit" value="Cerrar" class="Close">
	</fieldset>
</div>
</div>
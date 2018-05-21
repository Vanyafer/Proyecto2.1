

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/BarraNavegacion.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/Popup.css">
    <link rel="stylesheet" href="./assets/css/icomoon/style.css">
    	<script src="./assets/js/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	         $(".popup").fadeOut(400);
	    });
	    $(".Abrir").click(function(){
	        $(".overlay").fadeIn(400);
	        $(".popup").fadeIn(400);
	    });
});
</script>

<nav class="barra">
<ul>
	<?php
		/* if ($_SESSION['tipo_usuario']==3){
		 		echo '<li><a href="Moderador.php">M</a></li>';
		 }*/
	?>
	<li><a href="Control.php?c=Inicio&a=Inicio">Inicio</a></li>
	<li><a href="Control.php?c=Foro&a=Foro" class="icon-bullhorn"></a></li>
	<li><a id="reto" href="Control.php?c=Reto&a=Reto" class="icon-pen"></a></li>
	
	<li><a href="" class="icon-newspaper"></a></li>
	<li><a class="icon-quill Abrir"></a></li>
	<li><a href="Mensajes.php" class="icon-bubbles4"></a></li>
	<li><a href="Control.php?c=UsuarioR&a=UsuarioR">U</a></li>
	<li><a href="Control.php?c=Perfiles&a=Perfiles" class="icon-user"></a></li>
	<li><a href="Control.php?c=Usuario&a=Configuracion" class="icon-cog"></a></li>

	<li><a href="Control.php?c=Usuario&a=Cerrarsesion" class="abajo">C</a></li>
</ul>	
</nav>
<div class="overlay">
	<div class="popup">
		    		<?php 
		    		
		    		require("./vistas/Inicio/Publicar.php"); ?>
	
</div>

</div>

	<?php
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				document.getElementById('reto').style.visibility='visible';
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>document.getElementById('reto').style.display='none';</script>";
			}

			
	?>

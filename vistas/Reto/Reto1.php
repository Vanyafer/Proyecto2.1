<?php
include("conexion.php");




?>
<!DOCTYPE html>
<html>
<head>
	<title>Reto</title>
<link rel="stylesheet" type="text/css" href="css/Reto1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/icomoon/style.css">
    	<script src="js/jquery.min.js"></script>
   <script type="text/javascript">

	$(document).ready(function(){
		 plusSlides(1);
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
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  
  slides[slideIndex-1].style.display = "block"; 
}
</script>
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
	echo "<script Language='JavaScript'>
				$(document).ready(function(){	
					document.getElementById('apoyo').style.display='none';
				});
		</script>";
	echo "<script> $(document).ready(function(){	
					document.getElementById('hecho').style.visibility='visible';
				}); </script>";
			$result=mysqli_fetch_array($consulta);
			$aceptado = $result['id_aceptado'];
			$consulta=mysqli_query($conexion,"SELECT * FROM imagen_reto where id_aceptado= $aceptado");
	if($consulta){	
		$result=mysqli_fetch_array($consulta);
	}


}
?>

</head>
<body>		

	<div class="Reto">
	
		<div class="Box texto">
			<h1>Reto</h1>
			<div class="Descripcion"><?php echo $des; ?></div>
			<div class="Dias"><p>Ultimo dia: <?php echo $fecha; ?></p></div>
			<div class="Subir" id="subir"><a class="Abrir1">Subir</a></div>
		</div>
		<div class="Box ">

			<div class="slideshow-container Apoyo" id="apoyo">

				<div class="mySlides fade">
				  <img src="./imgApoyo/perro.jpg">
				</div>

				<div class="mySlides fade">
				  <img src="./imgApoyo/gorro.jpg">
				</div>

				<div class="mySlides fade">
				  <img src="./imgApoyo/pelota.jpg">
				</div>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<div id="hecho">
				<?php echo "<img src=".$result['imagen'].">"; ?>
			</div>
		</div>
		

	
	</div>
<div class="Retos">
	<div class="Box">
		<p>Retos hechos</p>
			<div class="slideshow-container Apoyo" id="apoyo">
				<?php
				$consultaHechos=mysqli_query($conexion,"SELECT * FROM retos_aceptados where id_artista = $artista ");

          		while ($resultHechos = mysqli_fetch_array($consultaHechos)){
						$aceptado = $result['id_aceptado'];
						$consultaImagen=mysqli_query($conexion,"SELECT * FROM imagen_reto where id_aceptado= $aceptado");
						$imagen = mysqli_fetch_array($consultaImagen);
							echo "<div class='mySlides fade'>
							  <img src=".$imagen['imagen'].">
							</div>";

				}
				?>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
	</div>

	<div class="Box">
		<p>Todos</p>
		<div class="slideshow-container Apoyo" id="apoyo">
				<?php
				$consultaTodos=mysqli_query($conexion,"SELECT * FROM imagen_reto");
          		while ($resultTodos = mysqli_fetch_array($consultaTodos)){
						
							echo "<div class='mySlides fade'>
							  <img src=".$result['imagen'].">
							</div>";

				}
				?>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

		</div>
	</div>
</div>

<div class="overlay1">
	<div class="popup1">
		    		<?php include "Subir.php"; ?>
	
</div>
</div>
</body>
</html>

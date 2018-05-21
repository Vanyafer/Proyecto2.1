<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Foro</title>
	<link rel="stylesheet" type="text/css" href="css/Foro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>		
<?php include "BarraNavegacion.php"; ?>

<div class="Banner">
<a class="Boton" href="Nuevohilo.php">Crear nuevo hilo</a>
<h1>Foro de discusión</h1>
</div>

<div class="Foros">
	<p>Favoritos</p>
		<?php
			$usuario = $_SESSION['id_usuario'];
			$consulta0 = mysqli_query($conexion,"SELECT * FROM foro_favs where id_usuario = $usuario ORDER BY id_favs DESC");
      $consulta5 = mysqli_query($conexion,"SELECT nombre_usuario FROM foro_favs");
			echo '<table>
          		<tr>
            <th class="cinta">Hilo</th>
            <th class="cinta">Fecha</th>
            <th class="cinta">Usuario</th>
          </tr>';
          while ($result0 = mysqli_fetch_array($consulta0)) {
          	$idforofav = $result0['id_forohilo'];
          	$consulta4 = mysqli_query($conexion,"SELECT * FROM foro_hilo where id_forohilo = $idforofav");
          	$result4 = mysqli_fetch_array($consulta4);
            $idusupost = $result4['id_usuario'];
            $consulta5 = mysqli_query($conexion,"SELECT nombre_usuario FROM usuario where id_usuario = $idusupost");
            $result5 = mysqli_fetch_array($consulta5);
          	echo "<tr>";
            	echo'<td class="izq">';	
               		echo '<h3><a href="hilo2.php?id=' . $result4['id_forohilo'] . '">' . $result4['titulo'] . '</a></h3>';
            	echo "</td>";
           		echo '<td class="der">';
                	echo date('d-m-Y', strtotime($result4['fecha']));
            	echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$result5['nombre_usuario'].'</h3>';
              echo "</td>";
        	echo "</tr>";
          }
          echo "</table>";
		?>
</div>

<div class="Foros" id="Ideas">
	<p>Ideas</p>
		<?php
			$consulta1 = mysqli_query($conexion,"SELECT * FROM foro_hilo where id_forotipo = 1 order by id_forohilo DESC;"); 
			echo '<table>
          		<tr>
            <th>Hilo</th>
            <th>Fecha</th>
            <th>Usuario</th>
          </tr>
          ';
          while ($result1 = mysqli_fetch_array($consulta1)) {
            $idusupost = $result1['id_usuario'];
            $consulta5 = mysqli_query($conexion,"SELECT nombre_usuario FROM usuario where id_usuario = $idusupost");
            $result5 = mysqli_fetch_array($consulta5);

          		echo "<tr>";
            	echo'<td class="izq">';	
               		echo '<h3><a href="hilo2.php?id=' . $result1['id_forohilo'] . '">' . $result1['titulo'] . '</a><h3>';
            	echo "</td>";
           		echo '<td class="der">';
                	echo date('d-m-Y', strtotime($result1['fecha']));
            	echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$result5['nombre_usuario'].'</h3>';
              echo "</td>";
        	echo "</tr>";
          } 
          echo "</table>";
		?>
</div>

<div class="Foros" id="Objetos">
	<p>Objetos</p>
		<?php
			$consulta2 = mysqli_query($conexion,"SELECT * FROM foro_hilo where id_forotipo = 2 order by id_forohilo DESC;"); 
			echo '<table>
          		<tr>
            <th>Hilo</th>
            <th>Fecha</th>
            <th>Usuario</th>
          </tr>';
          while ($result2 = mysqli_fetch_array($consulta2)) {
            $idusupost = $result2['id_usuario'];
            $consulta5 = mysqli_query($conexion,"SELECT nombre_usuario FROM usuario where id_usuario = $idusupost");
            $result5 = mysqli_fetch_array($consulta5);
          		echo "<tr>";
            	echo'<td class="izq">';
               		echo '<h3><a href="hilo2.php?id=' . $result2['id_forohilo'] . '">' . $result2['titulo'] . '</a><h3>';
            	echo "</td>";
           		echo '<td class="der">';
                	echo date('d-m-Y', strtotime($result2['fecha']));
            	echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$result5['nombre_usuario'].'</h3>';
              echo "</td>";
        	    echo "</tr>";
          } 
          echo "</table>";
		?>
</div>

</body>
</html>

<?php
			if($_SESSION['tipo_usuario']==1){
				echo "<script Language='JavaScript'>
				document.getElementById('Objetos').style.visibility='visible';
				</script>";
			}
			if($_SESSION['tipo_usuario']==2){
				echo "<script Language='JavaScript'>document.getElementById('Objetos').style.display='none';</script>";
			}
	?>
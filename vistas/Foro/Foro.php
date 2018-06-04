
<!DOCTYPE html>
<html>
<head>
	<title>Foro</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>		

<div class="Banner">
<a class="Boton" href="Control.php?c=Foro&a=NuevoHilo">Crear nuevo hilo</a>
<h1>Foro de discusión</h1>
</div>

<div class="Foros">
  <?php
  $For = new ForoControlador();
  $fo = $For->ForoFavs($_SESSION['id_usuario']);

  echo '<table> 
  <tr>
  <th class="cinta">Hilo</th>
  <th class="cinta">Fecha</th>
  <th class="cinta">Usuario</th>
  </tr>';

  foreach ($fo as $f) {
    
    $us = new UsuarioControlador();
    $u = $us->Usuario($f->id_usuario);
  
    echo "<tr>";
    echo'<td class="izq">'; 
        echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id=' . $f->id_usuario. '">$u->nombre_usuario</a></h3>';
    echo "</td>";
    echo '<td class="der">';
        echo date('d-m-Y', strtotime($f->fecha));
    echo "</td>";
    echo '<td class="der">';
        echo '<h3><a href="Control.php?c=Foro&a=Hilo&id=' . $f->id_forohilo. '">$f->titulo</a></h3>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
?>
</div>

<div class="Foros" id="Ideas">
  <?php
  $For = new ForoControlador();
  $fo = $For->Foros(1);

  echo '<table> 
  <tr>
  <th class="cinta">Hilo</th>
  <th class="cinta">Fecha</th>
  <th class="cinta">Usuario</th>
  </tr>';

  foreach ($fo as $f) {
    
    $us = new UsuarioControlador();
    $u = $us->Usuario($f->id_usuario);
  
    echo "<tr>";
    echo'<td class="izq">'; 
        echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id=' . $f->id_usuario. '">'.$u->nombre_usuario.'</a></h3>';
    echo "</td>";
    echo '<td class="der">';
        echo date('d-m-Y', strtotime($f->fecha));
    echo "</td>";
    echo '<td class="der">';
        echo '<h3><a href="Control.php?c=Foro&a=Hilo&id=' . $f->id_forohilo. '">'.$f->titulo.'</a></h3>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
?>
</div>

<div class="Foros" id="Objetos">
  <?php
  $fo = $For->Foros(2);

  echo '<table> 
  <tr>
  <th class="cinta">Hilo</th>
  <th class="cinta">Fecha</th>
  <th class="cinta">Usuario</th>
  </tr>';

  foreach ($fo as $f) {
    
    $us = new UsuarioControlador();
    $u = $us->Usuario($f->id_usuario);
  
    echo "<tr>";
    echo'<td class="izq">'; 
        echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id=' . $f->id_usuario. '">'.$u->nombre_usuario.'</a></h3>';
    echo "</td>";
    echo '<td class="der">';
        echo date('d-m-Y', strtotime($f->fecha));
    echo "</td>";
    echo '<td class="der">';
        echo '<h3><a href="Control.php?c=Foro&a=Hilo&id=' . $f->id_forohilo. '">'.$f->titulo.'</a></h3>';
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
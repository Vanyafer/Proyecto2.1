
<?php 
$id_usuario = $_GET['id_usuario']; 
$con = 0; 

?>
<html>
<head>
	<title>Foro</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>		

<div class="Banner">
<a href="Control.php?c=Mensajes&a=Mensajes&id=7" class="boton" id="Moderador">Enviar mensaje al moderador</a>
<h1>Reportes</h1>
</div>

<div class="Foros Publicacion">
  <?php
  $ReC = new ReportesPublicacionesControlador();
  $Re = $ReC->ListaPublicacionesUsuario($id_usuario);
  $us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);
  echo '<h2>Reportes publicaciones</h2>
  <table> 
  <tr>
  <th class="cinta">Reporte</th>
  <th class="cinta">Fecha</th>
  <th class="cinta">Publicacion</th>
  </tr>';

  foreach ($Re as $R) {
    $con++;
    echo "<tr>";
    echo'<td class="izq">'; 
       echo '<h3>'.$con.'</h3>';
    echo "</td>";
    echo '<td class="der">';
        echo date('d-m-Y', strtotime($R->fecha));
    echo "</td>";
    echo '<td class="der">';
        echo '<h4><a class="Abrir2"  name="$u->nombre_usuario" id='.$R->id_publicacion.' idu='.$u->id_usuario.'>Abrir publicacion</a></h4>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
  $con = 0;
?>
</div>

<div class="Foros">
  <?php
  $ReC = new ReportesComentariosControlador();
  $Re = $ReC->ListaComentariosUsuario($id_usuario);

  echo '<h2>Reportes comentarios</h2>
  <table> 
  <tr>
  <th class="cinta">Reporte</th>
  <th class="cinta">Fecha</th>
  <th class="cinta">Comentario</th>

  </tr>';

  foreach ($Re as $R) {
    $con++;
    $Com = new ComentarioControlador();
    $co = $Com->Comentario($R->id_comentario);
    $Publicacion = new InicioControlador();
    $p =  $Publicacion->PublicacionInfo($co->id_publicacion);
    $Artista = new ArtistaControlador();
    $a = $Artista->Artista($p->id_artista);
    $us = new UsuarioControlador();
    $u = $us->Usuario($a->id_usuario);
    
    echo "<tr>";
    echo'<td class="izq">'; 
       echo '<h3>'.$con.'</h3>';
    echo "</td>";
    echo '<td class="der">';
        echo date('d-m-Y', strtotime($R->fecha));
    echo "</td>";
    echo '<td class="der">';
        echo '<h4><a class="Abrir2" name="$u->nombre_usuario" id='.$co->id_publicacion.' idu='.$u->id_usuario.'>'.$co->contenido.'</a></h4>';
    echo "</td>";
    echo "</tr>";

  } 
  echo "</table>";
?>
</div>

</body>
</html>

<?php 
if($_SESSION['tipo_usuario']==3){
  echo "<script>
      $('#Moderador').attr('href','Control.php?c=Moderador&a=BloquearUsuario&id_usuario=".$id_usuario."');
      $('#Moderador').html('Bloquear Usuario');
    </script>";
}
$us = new UsuarioControlador();
$u = $us->Usuario($id_usuario);
if($u->tipo_usuario ==2){
  echo "<script>$('.Publicacion').css('display','none');</script>";
}
?>
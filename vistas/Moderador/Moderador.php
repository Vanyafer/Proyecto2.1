<?php
$ReporteP = new ReportesPublicacionesControlador();
$RP = $ReporteP->ListaPublicaciones();

$ReporteC = new ReportesComentariosControlador();
$RC = $ReporteC->ListaComentarios();
$ReporteU = new ReportesUsuariosControlador();
$RU = $ReporteU->ListaUsuarios();
echo '<div class="Foros">
		<table>
      	<tr>
        	<th>Usuario</th>
            <th>Publicacion</th>
            <th>Reportado por</th>
            <th>Razón</th>
            <th>Aprobar</th>
        </tr>';
          foreach($RP as $r){
            $Publicacion = new InicioControlador();
            $P = $Publicacion->PublicacionInfo($r->id_publicacion);
            $Us = new UsuarioControlador();
            $u = $Us->Usuario($r->id_reportado);

            $ur = $Us->Usuario($r->id_reportero);
         

          	echo "<tr>";
            	echo'<td class="der">';	
               		echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$u->id_usuario.'" id="usuario">'.$u->nombre_usuario.'</a></h3>';
            	echo "</td>";
           		echo '<td class="der">';
                	echo '<h4><a class="Abrir2"  name="'.$u->nombre_usuario.'" id='.$r->id_publicacion.' idu='.$u->id_usuario.'>Abrir publicacion</a></h4>';
            	echo "</td>";
              echo '<td class="der">';
                 echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$ur->id_usuario.'" id="usuario">'.$ur->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$r->razon.'</h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<a href="Control.php?c=ReportesPublicaciones&a=EstatusReporte&id_reporte='.$r->id_reporte.'&estatus=1" >Sí</a>';
                  echo '<a href="Control.php?c=ReportesPublicaciones&a=EstatusReporte&id_reporte='.$r->id_reporte.'&estatus=2" >No</a>';
              echo "</td>";
        	echo "</tr>";
          }
          echo "</table>";
          echo "</div>";

echo '<div class="Foros">
		<table>
      	<tr>
        	<th>Usuario</th>
            <th>Comentario</th>
            <th>Reportado por</th>
            <th>Razón</th>
            <th>Aprobar</th>
        </tr>';
           foreach($RC as $r){
            $Comentario= new ComentarioControlador();
            $C = $Comentario->Comentario($r->id_comentario);
            $Us = new UsuarioControlador();
            $u = $Us->Usuario($r->id_reportado);

            $ur = $Us->Usuario($r->id_reportero);
         

            echo "<tr>";
              echo'<td class="der">'; 
                  echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$u->id_usuario.'" id="usuario">'.$u->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                   echo '<h4><a class="Abrir2" name="'.$u->nombre_usuario.'" id='.$C->id_publicacion.' idu='.$u->id_usuario.'>'.$C->contenido.'</a></h4>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$ur->id_usuario.'" id="usuario">'.$ur->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$r->razon.'</h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<a href="Control.php?c=ReportesComentarios&a=EstatusReporte&id_reporte='.$r->id_reporte.'&estatus=1" >Sí</a>';
                  echo '<a href="Control.php?c=ReportesComentarios&a=EstatusReporte&id_reporte='.$r->id_reporte.'&estatus=2" >No</a>';
              echo "</td>";
          echo "</tr>";
          }
          echo "</table>";
          echo "</div>";

echo '<div class="Foros">
		<table>
      	<tr>
        	<th>Usuario</th>
            <th>Reportado por</th>
            <th>Razón</th>
            <th>Aprobar</th>
        </tr>';
          foreach($RU as $r){
            $Us = new UsuarioControlador();
            $u = $Us->Usuario($r->id_reportado);

            $ur = $Us->Usuario($r->id_reportero);
         

            echo "<tr>";
              echo'<td class="der">'; 
                  echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$u->id_usuario.'" id="usuario">'.$u->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$ur->id_usuario.'" id="usuario">'.$ur->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$r->razon.'</h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<a href="AprobarReporte.php">Sí</a>';
                  echo '<a href="DenegarReporte.php">No</a>';
              echo "</td>";
          echo "</tr>";
          
          }
          echo "</table>";
          echo "</div>";

echo '<div class="Foros">
    <table>
        <tr>
          <th>Usuario</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Acciones</th>
        </tr>';
$Blo = new ModeradorControlador();
$Bl = $Blo->ListaBloqueados();
          foreach($Bl as $b){
            $Us = new UsuarioControlador();
            $u = $Us->Usuario($b->id_usuario);

         

            echo "<tr>";
              echo'<td class="der">'; 
                  echo '<h3><a href="Control.php?c=Perfiles&a=Perfiles&id='.$u->id_usuario.'" id="usuario">'.$u->nombre_usuario.'</a></h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$b->inicio.'</h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<h3>'.$b->fin.'</h3>';
              echo "</td>";
              echo '<td class="der">';
                  echo '<a href="Control.php?c=Moderador&a=DesbloquearUsuario&id='.$b->id_usuario.'">Desbloquear</a>';
                   echo '<a href="DenegarReporte.php">Editar</a>';
              echo "</td>";
          echo "</tr>";
          
          }
          echo "</table>";
          echo "</div>";

?>

<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">

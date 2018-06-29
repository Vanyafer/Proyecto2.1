
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="container">
    <div class="grid columns-2">
        <div class="notifications">
          <ul class="collection">
            <li class="header">
              Notificaciones
            </li>
  <?php
  $Noti = new  NotificacionesControlador();
  $No = $Noti->ListaNotificaciones();

  

  foreach ($No as $N) {
    $us = new USuarioControlador();
      $u = $us->Usuario($N->id_usuario1);
      $ux = $us->Usuario($N->id_usuario);
    if($N->tipo == 1 || $N->tipo == 2 ){
      
      $x = "<a class='Abrir2'  name=".$u->nombre_usuario." id=".$N->id_evento." idu=".$u->id_usuario.">".$ux->nombre_usuario." ".$N->contenido."</a>";
      //
    }
    
    if($N->tipo == 3){
      $x = "<a href='Control.php?c=Foro&a=Hilo&id=". $N->id_evento. "''>".$ux->nombre_usuario." ".$N->contenido."</a><a href='Control.php?c=Foro&a=Hilo&id=". $N->id_evento. "''><i class='fas fa-bullhorn'></i></a>";
    }
    if($N->tipo == 4 || $N->tipo == 5 || $N->tipo == 6){
      $x = "<a href='Control.php?c=Perfiles&a=Perfiles&id=".$ux->id_usuario."'>".$ux->nombre_usuario." ".$N->contenido."</a><a href='Control.php?c=Perfiles&a=Perfiles&id=". $ux->id_usuario. "''><i class='fas fa-info'></i></a>";
    }
    if($N->tipo == 7 || $N->tipo == 8){
        $x = "<a class='Abrir2'  name=".$u->nombre_usuario." id=".$N->id_evento." idu=".$u->id_usuario.">".$N->contenido."</a>";
    }
    if($N->tipo == 9){
      $x = "<a href='Control.php?c=Perfiles&a=Perfiles&id=".$u->id_usuario."'>".$N->contenido."</a><a href='Control.php?c=Perfiles&a=Perfiles&id=".$u->id_usuario."'><i class='fas fa-exclamation-triangle'></i></a>";
    }
  
        echo "<li class='item space-between'>".$x."</li>";

  }   
  ?>
          </ul>
        </div>
        <div class="recommended">
          <ul class="collection">
            <li class="header">
              Usuarios recomendados
            </li>
          </ul>
        </div>
    </div>
</div>
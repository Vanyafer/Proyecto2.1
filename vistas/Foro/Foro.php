
<!DOCTYPE html>
<html>
<head>
	<title>Foro</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/Foro.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


  <div class="container">
    <div class="space-between margin-top">
      <h1>Foro de Discusión</h1>
      <a href="Control.php?c=Foro&a=NuevoHilo" class="btn border">
        Crear nuevo hilo
        <i class="fas fa-plus"></i>
      </a>
    </div>
    <div class="grid columns-2">
      <ul class="collection">
        <li class="header">Hilos Propios</li>
        <?php
          $For = new ForoControlador();
          $fo = $For->ForoFavs($_SESSION['id_usuario']);

          foreach ($fo as $f) {
            
            $us = new UsuarioControlador();
            $u = $us->Usuario($f->id_usuario);
            $fa = $For->HiloContenido($f->id_forohilo); ?>

            <li class="item">
              <a class="title" href="Control.php?c=Foro&a=Hilo&id=<?php echo $fa->id_forohilo;?>"><?php echo $fa->titulo;?></a>
              <a>Fecha: <?php echo date('d-m-Y', strtotime($fa->fecha));?></a>
              <div class="right margin-top">
                <a class="author" href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $fa->id_usuario;?>"><?php echo $u->nombre_usuario;?></a>
              </div>
            </li>

          <?php } ?>
      </ul>
      <ul class="collection" id="Ideas">
        <li class="header">Hilos Ideas</li>
        <?php
        $For = new ForoControlador();
        $fo = $For->Foros(1);


        foreach ($fo as $f) {
          
          $us = new UsuarioControlador();
          $u = $us->Usuario($f->id_usuario); ?>
        
          <li class="item">
            <a class="title" href="Control.php?c=Foro&a=Hilo&id=<?php echo $f->id_forohilo;?>"><?php echo $f->titulo;?></a>
            <a>Fecha: <?php echo date('d-m-Y', strtotime($f->fecha));?></a>
            <div class="right margin-top">
              <a class="author" href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $f->id_usuario;?>"><?php echo $u->nombre_usuario;?></a>
            </div>
          </li>
          

        <?php }  ?>
      </ul>
      <ul class="collection" id="Objetos">
        <li class="header">Objetos</li>
        <?php

          $fo = $For->Foros(2);

          foreach ($fo as $f) {
            
            $us = new UsuarioControlador();
            $u = $us->Usuario($f->id_usuario); ?>
          
            <li class="item">
              <a class="title" href="Control.php?c=Foro&a=Hilo&id=<?php echo $f->id_forohilo;?>"><?php echo $f->titulo;?></a>
              <a>Fecha: <?php echo date('d-m-Y', strtotime($f->fecha));?></a>
              <div class="right margin-top">
                <a class="author" href="Control.php?c=Perfiles&a=Perfiles&id=<?php echo $f->id_usuario;?>"><?php echo $u->nombre_usuario;?></a>
              </div>
            </li>

          <?php } ?>
      </ul>
    </div>
  </div>

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
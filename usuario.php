<?php
    session_start();
    require_once("requires.php");

    $interfaz = new InterfazControlador();
    $controlador = $interfaz->getControlador();
    $accion = $interfaz->getAccion();

    $master = false;

    if($controlador && $accion):
        $class = $controlador."Controlador";
        if(class_exists($class)):
            $master = new $class();
            $master->$accion();
        endif;

    endif;
?>
<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/font-awesome/js/fontawesome-all.min.js"></script>
    <script src="assets/resources/jquery-3.2.1.js"></script>
<body>
    <?php 

        require("./vistas/Compartido/BarraNavegacionUsuario.php");
        require($interfaz->render());
          
    ?>
</body>
</html>
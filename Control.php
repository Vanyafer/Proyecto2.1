<?php
    session_start();
    require_once("requires.php");

    $interfaz = new InterfazControlador();
    $controlador = $interfaz->getControlador();
    $accion = $interfaz->getAccion();

    $result = false;

    if($controlador && $accion):


        $class = $controlador."Controlador";
        if(class_exists($class)):
            $result = new $class();
            $result->$accion();
        endif;

    endif;
?>
<!DOCTYPE html>
<html lang="en">
    
<body>
    <?php 
        require("./vistas/Compartido/BarraNavegacion.php");
        require($interfaz->render());
       
        include("./vistas/Compartido/Ocultar.php");
    ?>
</body>
</html>
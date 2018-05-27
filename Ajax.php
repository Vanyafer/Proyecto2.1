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
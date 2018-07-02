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
<head>
    <link rel="icon" type="image/png" href="./Imagenes/hexagono.png" />
    <title>Hivemind</title>
</head>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/font-awesome/js/fontawesome-all.min.js"></script>
    <script src="assets/resources/jquery-3.2.1.js"></script>
    <script src="assets/js/app/app.cookies.js"></script>
    <script src="assets/js/app/app.color.js"></script>

<body>
    <?php require("./vistas/Compartido/BarraNavegacion.php"); ?>
    <div class="space-left">
        <?php require($interfaz->render()); ?>
    </div>
    <?php include("./vistas/Compartido/Ocultar.php");?>
</body>
</html>
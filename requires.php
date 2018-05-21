<?php

    require_once("./controladores/DBConexion.php");

    $modelos = opendir("modelos");
    while ($modelo = readdir($modelos)):
        if(!is_dir($modelo)&&!strpos($modelo,".php")!==true):
            require_once('./modelos/'.$modelo);
        endif;
    endwhile;

    $controladores = opendir("controladores");
    while ($controlador = readdir($controladores)):
        if(!is_dir($controlador)&&!strpos($controlador,".php")!==true):
            require_once('./controladores/'.$controlador);
        endif;
    endwhile;

?>
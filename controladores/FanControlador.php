<?php

    Class FanControlador extends DBConexion {


        public function __construct(){}

        public function Insert($Edad, $imagen,$DatosFan, $Perfil,$Pais, $id_usuario){
        	$this->start();
        			$stmt = $this->pdo->prepare(
                            "INSERT into fan VALUES(NULL,$Edad,'$imagen','$DatosFan','$Perfil',$Pais,$id_usuario)"
                        );
                        $stmt->execute();
                        $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_fan) as id FROM fan"
                        );
                        $stmt->execute();
                        $fan = $stmt->fetch(PDO::FETCH_ASSOC);

        	$this->stop();
        	return $fan;
        }
    }

?>
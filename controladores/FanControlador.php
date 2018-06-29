<?php

    Class FanControlador extends DBConexion {


        public function __construct(){}

        public function Insert($imagen,$DatosFan, $Perfil, $id_usuario){
        	$this->start();
        			$stmt = $this->pdo->prepare(
                            "INSERT into fan VALUES(NULL,'$imagen','$DatosFan','$Perfil',$id_usuario)"
                        );
                        $stmt->execute();
                        $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_fan) as id FROM fan"
                        );
                        $stmt->execute();

        	$fan = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $fan["id_fan"];

        }
        public function Update($imagen,$DatosFan, $Perfil, $id_usuario){
            $this->start();
                    $stmt = $this->pdo->prepare(
                            "UPDATE fan set imagen_perfil = '$imagen', informacion_contacto ='$DatosFan',perfil = '$Perfil' where id_usuario = $id_usuario"
                        );
                        $stmt->execute();
                        $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_fan) as id FROM fan"
                        );

            $this->stop();
            return $fan;
        }
    }

?>
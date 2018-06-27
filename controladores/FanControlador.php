<?php

    Class FanControlador extends DBConexion {


        public function Insert($DatosFan, $Perfil, $id_usuario){
        	$this->start();
        			$stmt = $this->pdo->prepare(
                            "INSERT into fan VALUES(NULL,'$DatosFan','$Perfil',$id_usuario)"
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
        public function Update($DatosFan, $Perfil ){
            $this->start();
                $id_usuario = $_SESSION['id_usuario'];
                    $stmt = $this->pdo->prepare(
                            "UPDATE fan set informacion_contacto ='$DatosFan',perfil = '$Perfil' where id_usuario = $id_usuario"
                        );
                        $stmt->execute();
            $this->stop();
        }
        public function Fan($id_usuario){
             $this->start();
                   
                        $stmt = $this->pdo->prepare(
                            "SELECT  * FROM fan where id_usuario = $id_usuario"
                        );
                         $stmt->execute();
                        $f = $stmt->fetch(PDO::FETCH_ASSOC);
                        $fan  = new FanModelo();
                        $fan->set(
                            $f['id_fan'],
                            $f['informacion_contacto'],
                            $f['perfil'],
                            $f['id_usuario']
                            );

                        $this->stop();
            return $fan;
        }
    }

?>
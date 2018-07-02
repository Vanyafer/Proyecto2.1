<?php
	Class RetoAceptadoControlador extends DBConexion{

        public function RetoAceptado(){
        	$this->start();
            $id_artista = $_SESSION['id_artista'];
        	 $stmt = $this->pdo->prepare(
                    "SELECT MAX(id_aceptado) as id_aceptado FROM retos_aceptados where  id_artista = $id_artista"
                );
                $stmt->execute();
                $Reto = $stmt->fetch(PDO::FETCH_ASSOC);
              $this->stop();
            return $Reto;
        }
        public function AceptarReto($id_reto){
            $this->start();
            $id_artista = $_SESSION['id_artista'];
             $stmt = $this->pdo->prepare(
                    "INSERT into retos_aceptados VALUES(NULL,$id_artista,$id_reto)"
                );
            $stmt->execute();
            $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_aceptado) as id FROM retos_aceptados"
                        );
                        $stmt->execute();
                         $R = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $R["id"];
        }

        public function RetosAceptados(){
            $this->start();
            $id_artista = $_SESSION['id_artista'];
             $stmt = $this->pdo->prepare(
                    "SELECT * FROM retos_aceptados where  id_artista = $id_artista"
                );
                $stmt->execute();
                $lista = array();
                while($Reto = $stmt->fetch(PDO::FETCH_ASSOC)){
                $Retos = new RetoAceptadoModelo();
                $Retos->set(
                    $Reto["id_reto"],
                    $Reto["id_artista"],
                    $Reto["id_reto"]
                );
                $lista[] = $Retos;
            }
              $this->stop();
            return $Lista;
        }

    }
?>
<?php
	Class RetoControlador extends DBConexion{
		 public function __construct(){}

        public function Reto(){
        	$this->start();
        	 $stmt = $this->pdo->prepare(
                    "SELECT * FROM retos where  fecha <= NOW() order by id_reto DESC"
                );
                $stmt->execute();
                $stmt->execute();
                $Reto = $stmt->fetch(PDO::FETCH_ASSOC);
                $Retos = new PublicacionModelo();
                $Retos->set(
                    $Reto["id_reto"],
                    $Reto["fecha"],
                    $Reto["descripcion"]
                );
              $this->stop();
            return $Retos;
        }
        public function RetosAceptados(){


        }
        public function SubirReto(){

        }
	} 
?>
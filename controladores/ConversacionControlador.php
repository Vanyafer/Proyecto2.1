<?php

    Class ConversacionControlador extends DBConexion {


        public function Validar($id_usuario2){
        	$this->start();
        	$id_usuario1 = $_SESSION["id_usuario"];
        	$stmt = $this->pdo->prepare(
                    "SELECT * FROM conversacion WHERE ((id_usuario1 = $id_usuario1 and id_usuario2 = $id_usuario2) or (id_usuario1 = $id_usuario2 and id_usuario2 = $id_usuario1))"
                );
            $stmt->execute();
             if($stmt->rowCount() == 0){ 
             	
             	$stmt = $this->pdo->prepare(
                    "INSERT INTO conversacion values(NULL,$id_usuario1,$id_usuario2)"
                );
            	$stmt->execute();
            	$stmt = $this->pdo->prepare(
                   "SELECT MAX(id_conversacion) as id FROM conversacion"
                );
                $stmt->execute();
                $conversacion = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $conversacion["id"];
             }else{
             	$conversacion = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                return $conversacion["id_conversacion"];
             }
        }
        public function Conversaciones(){
        	$this->start();
        	$id_usuario = $_SESSION["id_usuario"];
        	$stmt = $this->pdo->prepare(
                    "SELECT * FROM conversacion WHERE id_usuario1 = $id_usuario or id_usuario2 = $id_usuario"
            );
            $stmt->execute();
            $lista = array();
            
            while($Conversacion = $stmt->fetch(PDO::FETCH_ASSOC)){
                $Conversaciones = new ConversacionModelo();
                $Conversaciones->set(
                    $Conversacion["id_conversacion"],
					$Conversacion["id_usuario1"],
					$Conversacion["id_usuario2"]
					);
                $lista[] = $Conversaciones;

            }
           

            $this->stop();
            return $lista;

        }

    }
 ?>
<?php

    Class MensajesControlador extends DBConexion {


        public function __construct(){}
        public function Mensajes(){

		}
		public function Conversacion($id_usuario2){
						 $this->start();
			$co = new conversacionControlador();
			$c = $co->Validar($id_usuario2);

			$stmt = $this->pdo->prepare(
                    "SELECT * FROM mensaje WHERE  id_conversacion = $c"
                );
                $stmt->execute();
                $lista = array();
            
            while($Mensaje = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Mensajes = new MensajesModelo();
                $Mensajes->set(
                    $Mensaje["id_mensaje"],
					$Mensaje["fecha"],
					$Mensaje["texto"],
					$Mensaje["id_conversacion"],
					$Mensaje["id_usuario"]
					);
                $lista[] = $Mensajes;

            endwhile;
           

            $this->stop();
            return $lista;
		}
        public function Mandar(){
			$this->start();

			$texto = $_POST['Texto'];
			$id_usuario = $_SESSION['id_usuario'];
			$id_usuario2 = $_POST['id_usuario'];
			$co = new conversacionControlador();
			$c = $co->Validar($id_usuario2);

			$stmt = $this->pdo->prepare(
                    "INSERT into mensaje values(NULL,NOW(),'$texto',$c,$id_usuario)"
                );
            $stmt->execute();
             $this->stop();

           

		}
    }
?>
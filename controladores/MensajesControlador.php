<?php

    Class MensajesControlador extends DBConexion {


        public function __construct(){}
        public function Mensajes($id_conversacion){
			 $this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM comentario WHERE  id_conversacion = $id_conversacion"
                );
                $stmt->execute();
                $lista = array();
            
            while($Mensaje = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Mensajes = new MensajeModelo();
                $Mensajes->set(
                    $Mensaje["id_mensajes"],
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

			$text= $_POST['texto'];
			$id_usuario = $_SESSION['id_usuario'];
			$id_usuario2 = $_POST['id_usuario2'];
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
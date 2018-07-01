<?php 
 class ForoRespuestaControlador extends DBConexion
 {
 	
	public function Respuestas($id_forohilo){
		$this->start();
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_respuesta where id_forohilo = $id_forohilo ORDER BY id_fororespuesta DESC"
                        );
        		$stmt->execute();

				$lista = array();
                while($F = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Res = new ForoRespuestaModelo();
                    $Res->set(
                     $F["id_fororespuesta"],
                     $F["fecha"],
                     $F["contenido"],
                     $F["id_forohilo"],
                     $F["id_usuario"],
                     $F["ocultar"]
			                    );
                    $lista[] = $Res;
                }
              $this->stop();
            return $lista;	
	}
	public function Responder(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$this->start();
				$id_hilo = $_POST['id_forohilo'];
				$cont = $_POST['contenido'];
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
	                           "INSERT INTO foro_respuesta VALUES (NULL, NOW(), '$cont', $id_hilo, $id_usuario,0)"
	                        );
	        	$stmt->execute();
            
            $Noti = new NotificacionesControlador();
            $foro = new ForoControlador();
            $f = $foro->HiloContenido($id_hilo);
            
             if($id_usuario != $f->id_usuario){
            $Noti->Insert(3,$id_usuario,$id_hilo,$f->id_usuario);
           }
           
        	$this->stop();
		}
	}
	public function ElimiarRespuestaUsuario(){
		 $this->start();
			$id_fororespuesta=$_POST['id_f'];
            $stmt = $this->pdo->prepare(
                    "UPDATE foro_respuesta set ocultar = 1 WHERE  id_fororespuesta = $id_fororesuesta"
                );
            $stmt->execute();
             $this->stop();
	}
	public function ElimiarRespuesta(){
		$this->start();
			$id_fororespuesta=$_POST['id_f'];
            $stmt = $this->pdo->prepare(
                    "DELETE FROM foro_respuesta WHERE  id_fororespuesta = $id_fororespuesta"
                );
            $stmt->execute();
             $this->stop();
	}
 }
?>
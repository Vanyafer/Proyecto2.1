<?php 
	Class NotificacionesControlador extends DBConexion{
	
        public function Notificaciones(){}

		public function ListaNotificaciones(){
			$this->start();
                $id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
                    "SELECT * FROM notificaciones where id_usuario1 = $id_usuario order by id_notificaciones desc"
                );

                $stmt->execute();
                $lista = array();
                while($N = $stmt->fetch(PDO::FETCH_ASSOC)){
                     $Noti = new NotificacionesModelo();
                        $Noti->set(
                            $N['id_notificacion'],
                            $N['tipo'],
                            $N['contenido'],
                            $N['id_usuario'],
                            $N['visto'],
                            $N['fecha'],
                            $N['id_evento'],
                            $N['id_usuario1']
                            );
                        $lista[] = $Noti;
            }

			$this->stop();
			return $lista;

		}
        public function Insert($tipo,$id_usuario,$id_evento,$x){
                $this->start();
                $contenido = array(
                    "",
                    "ha calificado tu publicaciones",
                    "ha comentado tu publicacion", 
                    "ha respondido tu foro", 
                    "te esta siguiendo", 
                    "acepto tu solicitud de amistad",
                    "te envio solicitud de amistas",
                    "Tu comentario fue reportado",
                    "Tu publicacion fue reportada",
                    "Tu cuenta fue reportada");
                $c = $contenido[$tipo];
                $stmt = $this->pdo->prepare(
                    "INSERT INTO notificaciones VALUES(NULL,$tipo,'$c',$id_usuario,0,NOW(),$id_evento,$x)"
                );

                $stmt->execute();
                $this->stop();
        }
        public function Update(){
            $this->start();
            $id_noti = $_POST['id_noti'];
            $stmt = $this->pdo->prepare(
                "UPDATE  notificaciones set visto = 0 where id_notificaciones = $id_noti"
            );
            $stmt->execute();
            $this->stop();
        }
}
        ?>
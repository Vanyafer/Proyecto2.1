<?php 
 
 class ForoControlador extends DBConexion
 {
 	public function __construct()
    {
    }

    public function Hilo(){
            $id_forohilo=$_GET['id'];
            $Fo = new ForoControlador();
            $f = $Fo -> ForoFav($id_forohilo);
            header("Location: Control.php?c=Foro&a=Hilo&id=$id_forohilo");
    }

 	public function ForoFavs($id_usuario){
 		 $this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM foro_favs WHERE  id_usuario = $id_usuario"
                );
                $stmt->execute();
                $lista = array();
            
            while($ForoFav = $stmt->fetch(PDO::FETCH_ASSOC)):
                $ForoFavs = new ForoFavsModelo();
                $ForoFavs->set(
                    $ForoFav["id_favs"],
					$ForoFav["id_usuario"],
					$ForoFav["id_forohilo"]
					);
                $lista[] = $ForoFavs;

            endwhile;
           

            $this->stop();
            return $lista;
 	}

 	public function ForoFav($id_forohilo){
			$this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM foro_hilo WHERE  id_forohilo = $id_forohilo"
                );
                $stmt->execute();
                $lista = array();
            
            $ForoFav = $stmt->fetch(PDO::FETCH_ASSOC);
                $ForoFavs = new ForoModelo();
                $ForoFavs->set(
                    $ForoFav["id_forohilo"],
					$ForoFav["fecha"],
					$ForoFav["contenido"],
					$ForoFav["titulo"],
					$ForoFav["id_forotipo"],
                    $ForoFav["id_usuario"]
					);
                

            $this->stop();
            return $ForoFavs;
		}

    public function Respuestas($id_forohilo){
         $this->start();
            $stmt = $this->pdo->prepare(
                    "SELECT * FROM foro_respuestas WHERE  id_forohilo = $id_forohilo"
                );
                $stmt->execute();
                $lista = array();
            
            while($Respuesta = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Respuestas = new RespuestaModelo();
                $Respuestas->set(
                    $Respuesta["id_respuesta"],
                    $Respuesta["fecha"],
                    $Respuesta["contenido"],
                    $Respuesta["id_usuario"],
                    $Respuesta["id_publicacion"]
                    );
                $lista[] = $Respuestas;

            endwhile;
           

            $this->stop();
            return $lista;
    }

    public function Respuesta($id_respuesta){
            $this->start();
            $stmt = $this->pdo->prepare(
                    "SELECT * FROM foro_respuestas WHERE  id_respuesta = $id_respuesta"
                );
                $stmt->execute();
                $lista = array();
            
            while($Respuesta = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Respuestas = new RespuestaModelo();
                $Respuestas->set(
                    $Respuesta["id_respuesta"],
                    $Respuesta["fecha"],
                    $Respuesta["contenido"],
                    $Respuesta["id_usuario"],
                    $Respuesta["id_publicacion"]
                    );
            endwhile;
                

            $this->stop();
            return $Respuestas;
        }

    public function AgregarFavs(){
             $this->start();
            $id_forohilo = $_GET['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $stmt = $this->pdo->prepare(
                    "INSERT INTO foro_favs values (NULL, $id_usuario, $id_forohilo)"
                );
            $stmt->execute();
             $this->stop();
        }

    public function Responder(){
             $this->start();
            $id_forohilo = $_POST['id_forohilo'];
            $contenido = $_POST['contenido'];
            $id_usuario = $_SESSION['id_usuario'];
            $stmt = $this->pdo->prepare(
                    "INSERT into foro_respuesta values(NULL,NOW(),'$contenido',$id_forohilo,$id_usuario)"
                );
            $stmt->execute();
             $this->stop();
        }
 }
?>
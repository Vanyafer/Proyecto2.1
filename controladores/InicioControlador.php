<?php 
	Class InicioControlador extends DBConexion {
		public $publicacion;

		public function Inicio(){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion order by id_publicacion DESC"
                );

                $stmt->execute();
                $lista = array();
                while($Publicacion = $stmt->fetch(PDO::FETCH_ASSOC)):
                $Publicaciones = new PublicacionModelo();
                $Publicaciones->set(
                    $Publicacion["id_publicacion"],
                    $Publicacion["fecha"],
                    $Publicacion["contenido_explicito"],
                    $Publicacion["contenido"],
                    $Publicacion["etiquetas"],
                    $Publicacion["privacidad"],
                    $Publicacion["imagen"],
                    $Publicacion["id_artista"]
                );
                $lista[] = $Publicaciones;

            endwhile;
           

            $this->stop();
            $this->publicacion = $lista;
            //require("./vistas/Inicio/inicio.php");
            //require_once ("./vistas/Inicio/Publicacion.php");
		}
		public function Publicacion(){
			$id_publicacion = $_POST['idp'];
			$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion WHERE id_publicacion = $id_publicacion"
                );
                $stmt->execute();
                $Publicacion = $stmt->fetch(PDO::FETCH_ASSOC);
                $Publicaciones = new PublicacionModelo();
                $Publicaciones->set(
                    $Publicacion["id_publicacion"],
                    $Publicacion["fecha"],
                    $Publicacion["contenido_explicito"],
                    $Publicacion["contenido"],
                    $Publicacion["etiquetas"],
                    $Publicacion["privacidad"],
                    $Publicacion["imagen"],
                    $Publicacion["id_artista"]
                );
              $this->stop();

              require_once "./vistas/Inicio/Publicacion.php";
              return $Publicaciones;
		}
        public function PublicacionInfo($id_publicacion){
            $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion WHERE id_publicacion = $id_publicacion"
                );
                $stmt->execute();
                $Publicacion = $stmt->fetch(PDO::FETCH_ASSOC);
                $Publicaciones = new PublicacionModelo();
                $Publicaciones->set(
                    $Publicacion["id_publicacion"],
                    $Publicacion["fecha"],
                    $Publicacion["contenido_explicito"],
                    $Publicacion["contenido"],
                    $Publicacion["etiquetas"],
                    $Publicacion["privacidad"],
                    $Publicacion["imagen"],
                    $Publicacion["id_artista"]
                );
              $this->stop();
              return $Publicaciones;
        }

		public function Publicar(){
			if($_SERVER['REQUEST_METHOD']=='POST'){

			$this->start();
		
			$des = $_POST['des'];
			if(isset($_POST['edad'])){
				$edad = 1;
			
			}else{
				$edad = 0;
			}
			$tipo = $_POST['tipoP'];
			$id_usuario = $_SESSION['id_usuario'];
	        $art = new ArtistaControlador();
	        $a = $art->ArtistaUsuario($id_usuario);

			if($_FILES["image"]["name"]==''){
				$stmt = $this->pdo->prepare("INSERT into publicacion VALUES(NULL,NOW(),$edad,'$des',NULL,$tipo,null,$a->id_artista)");

                $stmt->execute();
			}else{
				$folder="./Imagenes/imgPublicacion/";
				$tmp_name = $_FILES["image"]["tmp_name"];
				move_uploaded_file( $tmp_name,"$folder".$_FILES["image"]["name"]);
				$imagen = $folder.$_FILES["image"]["name"];
				$stmt = $this->pdo->prepare("INSERT into publicacion VALUES(NULL,NOW(),$edad,'$des',NULL,$tipo,'$imagen',$a->id_artista)");

                $stmt->execute();
			}

                $this->stop();
			}
			 header("Location: Control.php?c=Inicio&a=Inicio");
		}
		public function EliminarPublicacion(){
			$id_publicacion = $_GET['id'];
			$this->start();
			$stmt = $this->pdo->prepare(
                    "SELECT * FROM comentario where id_publicacion = $id_publicacion"
                );

                $stmt->execute();
			while($Comentario = $stmt->fetch(PDO::FETCH_ASSOC)):
				$id_comentario = $Comentario["id_comentario"];
              $stmt = $this->pdo->prepare(
                    "DELETE FROM reportes_comentarios where id_comentario = $id_comentario"
                );
                $stmt->execute();
            endwhile;
            $stmt = $this->pdo->prepare(
                    "DELETE FROM comentario where id_publicacion = $id_publicacion"
                );
                $stmt->execute();
             $stmt = $this->pdo->prepare(
                    "DELETE FROM me_gusta where id_publicacion = $id_publicacion"
                );
                $stmt->execute();
              $stmt = $this->pdo->prepare(
                    "DELETE FROM Publicacion where id_publicacion = $id_publicacion"
                );
                $stmt->execute();
                header("location: Control.php?c=Inicio&a=Inicio");
		}
	}
?>
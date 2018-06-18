<?php 
	Class InicioControlador extends DBConexion {
		public $publicacion;

		public function Inicio(){
                $con = 0;
				$this->start();
                $Amigos = new AmigosControlador();
                $am = $Amigos->ListaAmigos();
                $listaU = array();
                if(isset($_SESSION['id_artista'])){
                     $listaU[$con] = $_SESSION['id_artista'];

                   }
                foreach ($am as $a) {
                    $con++;
                    $artista = new ArtistaControlador();
                   if($a->id_usuario1 == $_SESSION['id_usuario']){
                        $ar = $artista->ArtistaUsuario($a->id_usuario2);
                        $listaU[$con] = $ar->id_usuario;
                   }
                   if($a->id_usuario1 == $_SESSION['id_usuario']){
                        $ar = $artista->ArtistaUsuario($a->id_usuario2);
                        $listaU[$con] = $ar->id_usuario;
                   }

                }
                $Seguidores = new SeguidoresControlador();
                $se  = $Seguidores->ListaSiguiendo();
                foreach ($se as $s) {
                        $con++;
                        $artista = new ArtistaControlador();
                        $ar = $artista->ArtistaUsuario($s->id_usuario2);
                        $listaU[$con] = $ar->id_artista;
                   
                }
                 $x = implode(",", $listaU);
                $Usuarios = new UsuarioControlador();
                $u = $Usuarios->Usuario($_SESSION['id_usuario']);
                if($u->permitir_18==1){
                     $c = "0,1";
                }else{
                     $c = "0";
                }
               $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion where ocultar = 0 and id_artista in ($x) and contenido_explicito in ($c) order by id_publicacion DESC"
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
                    $Publicacion["id_artista"],
                    $Publicacion["ocultar"]
                );
                $lista[] = $Publicaciones;

            endwhile;
           

            $this->stop();
            $this->publicacion = $lista;
            //require("./vistas/Inicio/inicio.php");
            //require_once ("./vistas/Inicio/Publicacion.php");
		}
        public function PublicacionSola(){
            
        }
        public function InicioUsuario(){
            $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion where contenido_explicito = 0 and privacidad = 0 and imagen is not null and contenido_explicito = 0 order by id_publicacion DESC"
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
                    $Publicacion["id_artista"],
                    $Publicacion["ocultar"]
                );
                $lista[] = $Publicaciones;

            endwhile;
           

            $this->stop();
            return $lista;
        }
		public function Publicacion(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
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
                    $Publicacion["id_artista"],
                    $Publicacion["ocultar"]
                );
              $this->stop();

              require_once "./vistas/Inicio/Publicacion.php";
              return $Publicaciones;
          }
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
                    $Publicacion["id_artista"],
                    $Publicacion["ocultar"]
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
    				$stmt = $this->pdo->prepare("INSERT into publicacion VALUES(NULL,NOW(),$edad,'$des',NULL,$tipo,null,$a->id_artista,0)");

                    $stmt->execute();
    			}else{
    				$folder="./Imagenes/imgPublicacion/";
    				$tmp_name = $_FILES["image"]["tmp_name"];
    				move_uploaded_file( $tmp_name,"$folder".$_FILES["image"]["name"]);
    				$imagen = $folder.$_FILES["image"]["name"];
    				$stmt = $this->pdo->prepare("INSERT into publicacion VALUES(NULL,NOW(),$edad,'$des',NULL,$tipo,'$imagen',$a->id_artista,0)");

                    $stmt->execute();
    			}

                    $this->stop();
    			}
			 header("Location: Control.php?c=Inicio&a=Inicio");
		}
        public function EliminarPublicacionUsuario(){
            $id_publicacion = $_GET['id'];
            $this->start();
            
            $stmt = $this->pdo->prepare(
                    "UPDATE publicacion set ocultar = 1  where id_publicacion = $id_publicacion"
                );

                $stmt->execute();
                $this->stop();
            if($_SESSION['tipo_usuario']==3){
                     header("location: Control.php?c=Moderador&a=Moderador");
            }else{
                header("location: Control.php?c=Inicio&a=Inicio");
            }
        }
		public function EliminarPublicacion($id_publicacion){
			$this->start();
			
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
            $this->stop();
		}
	}
?>
<?php 
	Class ColeccionControlador extends DBConexion{

        public function Coleccion(){

        }
	
		public function Colecciones($id_portafolio){
				$this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM coleccion where id_portafolio = $id_portafolio"
                );
                $stmt->execute();
                $lista = array();
                while($c= $stmt->fetch(PDO::FETCH_ASSOC)){
                $Colecciones = new ColeccionModelo;
                $Colecciones->set(
                       	$c['id_coleccion'],
						$c['descripcion'],
                        $c['id_portafolio']
                    );
                $lista[] = $Colecciones;
                }
                $this->stop();
				return $lista;
			
		}
        public function ImagenesColeccion($id_coleccion){
                $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM imagen_coleccion where id_coleccion = $id_coleccion"
                );
                $stmt->execute();
                $lista = array();
                while($c= $stmt->fetch(PDO::FETCH_ASSOC)){
                $Colecciones = new ImagenColeccionModelo;
                $Colecciones->set(
                        $c['id_imagencoleccion'],
                        $c['imagen'],
                        $c['id_coleccion']
                    );
                    $lista[] = $Colecciones;
                }
                $this->stop();
                return $lista;
            
        }
		public function AgregarColeccion(){
				$this->start();
                $descripcion =  $_POST['des'];
                $id_portafolio = $_POST['id_portafolio'];
                $stmt = $this->pdo->prepare(
                    "INSERT into coleccion VALUES(NULL,'$descripcion',$id_portafolio)"
                );
                $stmt->execute();
                 $stmt = $this->pdo->prepare(
                   "SELECT MAX(id_coleccion) as id FROM coleccion"
                );
                $stmt->execute();
                $c = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->stop();
                header("Location: Control.php?c=Coleccion&a=Coleccion&id=".$c['id']);

		}
        public function AgregarImagen(){
            $this->start();
                $id_coleccion=$_POST['id_coleccion'];
                $total = count($_FILES["image"]["name"]);
                for( $i=0 ; $i < $total ; $i++ ) {
                    $tmpFilePath = $_FILES["image"]["tmp_name"][$i];
                    $folder = "./Imagenes/imgColeccion/";
                    move_uploaded_file($tmpFilePath, $folder.$_FILES["image"]["name"][$i]);
                    $imagen = $folder.$_FILES["image"]["name"][$i];

                    $stmt = $this->pdo->prepare(
                    "INSERT into imagen_coleccion VALUES(NULL,'$imagen',$id_coleccion)"
                    );
                    $stmt->execute();
                  
                }
            $this->stop();

                header("Location: Control.php?c=Coleccion&a=Coleccion&id=".$id_coleccion);
        }
        public function EliminarImagen(){
             $this->start();
                $id_coleccion = $_GET['id_c'];
                $id_imagen =$_GET['id_i'];
                
                    $stmt = $this->pdo->prepare(
                    "DELETE FROM imagen_coleccion where id_imagencoleccion = $id_imagen"
                    );
                    $stmt->execute();
            $this->stop();

                header("Location: Control.php?c=Coleccion&a=Coleccion&id=".$id_coleccion);
        }
        public function EliminarColeccion(){
             $this->start();
                $id_coleccion=$_GET['id'];
                
                    $stmt = $this->pdo->prepare(
                    "DELETE FROM imagen_coleccion where id_coleccion = $id_coleccion"
                    );
                    $stmt->execute();
                    $stmt = $this->pdo->prepare(
                    "DELETE FROM coleccion where id_coleccion = $id_coleccion"
                    );
                    $stmt->execute();
            $this->stop();
            $art = new ArtistaControlador();
            $a = $art->ArtistaUsuario($_SESSION['id_usuario']);
             header("Location: Control.php?c=Portafolio&a=Portafolio&id=".$a->id_portafolio);
        }
        public function UpdateColeccion(){
            $this->start();
                $id_coleccion=$_POST['id_coleccion'];
                $descripcion = $_POST['desc'];
                    $stmt = $this->pdo->prepare(
                    "UPDATE coleccion set descripcion = '$descripcion' where id_coleccion = $id_coleccion"
                    );
                    $stmt->execute();
            $this->stop();
            header("Location: Control.php?c=Coleccion&a=Coleccion&id=".$id_coleccion);
        }
	}
?>
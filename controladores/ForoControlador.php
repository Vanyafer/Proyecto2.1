<?php 
 class ForoControlador extends DBConexion
 {
 	
 	public function Foro(){
 		
 	}
 	public function Hilo(){
 		$this->start();
 		$id = $_GET['id'];
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_hilo where id_forohilo = $id"
                        );
        		$stmt->execute();
        $F = $stmt->fetch(PDO::FETCH_ASSOC);
                    $Foro = new ForoModelo();
                  $Foro->set(
                        $F['id_forohilo'],
						$F['fecha'],
						$F['contenido'],
						$F['titulo'],
						$F['id_forotipo'],
						$F['id_usuario']
			                    );
              $this->stop();
          return $Foro;
 	}
 	public function NuevoHilo(){
 		if($_SERVER['REQUEST_METHOD']=='POST'){
 		$this->start();
		$des = $_POST['descripcion'];
		$titulo = $_POST['titulo'];
		$id_usuario = $_SESSION['id_usuario'];
		$tipo = $_POST['tipoF'];
		$us = new UsuarioControlador();
		$u = $us->Usuario($id_usuario);

		$stmt = $this->pdo->prepare(
                            "INSERT into foro_hilo VALUES(NULL,NOW(),'$des','$titulo',$tipo, $u->id_usuario)"
                        );
        $stmt->execute();
		
		$this->stop();
		header("Location: Control.php?c=Foro&a=Foro");
			}
 	}
 	public function ForoFavs($id_usuario){
			$this->start();
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_favs where id_usuario = $id_usuario ORDER BY id_favs DESC"
                        );
        		$stmt->execute();

			 $lista = array();
                while($F = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Foro = new ForoFavsModelo();
                    $Foro->set(
                        $F["id_favs"],
                        $F["id_pais"],
                        $F["id_forohilo"]
                    );
                    $lista[] = $Foro;
                }
              $this->stop();
            return $lista;	
	}
	public function Foros($id_tipo){
		$this->start();
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_hilo where id_forotipo = $id_tipo ORDER BY id_forohilo DESC"
                        );
        		$stmt->execute();

			 $lista = array();
                while($F = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Foro = new ForoModelo();
                    $Foro->set(
                        $F['id_forohilo'],
						$F['fecha'],
						$F['contenido'],
						$F['titulo'],
						$F['id_forotipo'],
						$F['id_usuario']
			                    );
                    $lista[] = $Foro;
                }
              $this->stop();
            return $lista;	
	}
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
                     $F["id_usuario"]
			                    );
                    $lista[] = $Res;
                }
              $this->stop();
            return $lista;	
	}
 }
?>
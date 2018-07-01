<?php 
 class ForoControlador extends DBConexion
 {
 	public function Foro(){	
 	}
 	public function Hilo(){
 		$this->start();
 		$id = $_GET['id'];
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_hilo where id_forohilo = $id "
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
						$F['id_usuario'],
						$F['ocultar']
			                    );
              $this->stop();
          return $Foro;
 	}
 	public function HiloContenido($id){
 		$this->start();
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
						$F['id_usuario'],
						$F['ocultar']
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
                            "INSERT into foro_hilo VALUES(NULL,NOW(),'$des','$titulo',$tipo, $u->id_usuario,0)"
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
                        $F["id_usuario"],
                        $F["id_forohilo"]
                    );
                    $lista[] = $Foro;
                }
              $this->stop();
            return $lista;	
	}
	public function AgregarFavs(){
			$this->start();
				$id_hilo = $_GET['id'];
				$cont = $_POST['contenido'];
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
	                           "INSERT INTO foro_favs VALUES (NULL, $id_usuario, $id_hilo)"
	                        );
	        	$stmt->execute();
        	$this->stop();
        	header("Location: Control.php?c=Foro&a=Hilo&id=".$id_hilo);	
	}
	public function ConfirmarFavs($id_hilo){
		$this->start();
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
	                           "SELECT * FROM foro_favs WHERE id_usuario = $id_usuario and id_forohilo = $id_hilo"
	                        );
	        	$stmt->execute();


                if($stmt->rowCount() > 0){ 

        	$this->stop();
                	 return 1;
                }else{

        	$this->stop();
                	return 0;
                }
	}
	public function EliminarFavs(){
		$this->start();
				$id_forohilo = $_GET['id'];
				$id_usuario = $_SESSION['id_usuario'];
				$stmt = $this->pdo->prepare(
	                           "DELETE FROM foro_favs where id_usuario = $id_usuario  and id_forohilo = $id_forohilo"
	                        );
	        	$stmt->execute();
        	$this->stop();
        	header("Location: Control.php?c=Foro&a=Hilo&id=".$id_forohilo);
	}
	public function Foros($id_tipo){
		$this->start();
				$stmt = $this->pdo->prepare(
                           "SELECT * FROM foro_hilo where id_forotipo = $id_tipo and ocultar = 0 ORDER BY id_forohilo DESC"
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
						$F['id_usuario'],
						$F['ocultar']
			                    );
                    $lista[] = $Foro;
                }
              $this->stop();
            return $lista;	
	}
	public function EliminarForoUsuario(){
		 $this->start();
			$id_forohilo=$_GET['id_f'];
            $stmt = $this->pdo->prepare(
                    "UPDATE foro_hilo SET ocultar = 1 WHERE  id_forohilo = $id_forohilo"
                );
            $stmt->execute();
            $stmt = $this->pdo->prepare(
                    "DELETE FROM foro_favs WHERE  id_forohilo = $id_forohilo"
                );
            $stmt->execute();
             $this->stop();
             header("Location: Control.php?c=Foro&a=Foro");	
	}
	public function ElimiarForo(){
		$this->start();
			$id_forhilo=$_GET['id_f'];
			$stmt = $this->pdo->prepare(
				"DELETE FROM foro_favs WHERE  id_forohilo = $id_forohilo"
			);
			$stmt->execute();
            $stmt = $this->pdo->prepare(
                    "DELETE FROM foro_hilo WHERE  id_forohilo = $id_forohilo"
                );
            $stmt->execute();
             $this->stop();
	}
 }
?>
<?php
 Class ModeradorControlador extends DBConexion{

 	public function Moderador(){

 	}
 	public function BloquearUsuario(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->start();
            $id_usuario = $_POST['id_usuario'];
            if($_POST['fecha']==0){
                $fin = $_POST['fin'];
                $fecha = date_create($fin);
                $f = date_format($fecha, 'Y-m-d H:i:s'); 

                $stmt = $this->pdo->prepare(
                            "INSERT into bloqueados VALUES(NULL,$id_usuario,NOW(),'$f',0)"
                        );
                $stmt->execute();
              

            }else{
                $fin = $_POST['fecha'];
                $x = $fin." days";
                $fecha = date('Y-m-d H:i:s');
                $fecha = date_create($fecha);
                $fecha = date_add($fecha,date_interval_create_from_date_string($x));

                $f = date_format($fecha, 'Y-m-d H:i:s'); 

                $stmt = $this->pdo->prepare(
                            "INSERT into bloqueados VALUES(NULL,$id_usuario,NOW(),'$f',0)"
                        );
                $stmt->execute();
              
            }
              $stmt = $this->pdo->prepare(
                            "UPDATE usuario set bloqueado = 1 where id_usuario = $id_usuario"
                        );
                $stmt->execute();
                $this->stop();
                header("Location: Control.php?c=Reportes&a=ReportesUsuario&id_usuario=$id_usuario.");
        }
    }
    public function DesbloquearUsuario(){
        $this->start();
        $id_usuario = $_GET['id'];
        $stmt = $this->pdo->prepare(
                            "UPDATE usuario set bloqueado = 0 where id_usuario = $id_usuario"
                        );
        $stmt->execute();
        $stmt = $this->pdo->prepare(
                            "DELETE from bloqueados  where id_usuario = $id_usuario"
                        );
        $stmt->execute();
        $this->stop();
        header("Location: Control.php?c=Moderador&a=Moderador");
    }
    public function ListaBloqueados(){
            $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM bloqueados where expirado = 0"
                );

                $stmt->execute();
                $lista = array();
                while($B = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Bloqueados = new BloqueadosModelo();
                    $Bloqueados->set(
                        $B['id_bloqueado'],
                        $B['id_usuario'],
                        $B['inicio'],
                        $B['fin'],
                        $B['expirado']
                    );
                    $lista[] = $Bloqueados;

                }

            $this->stop();
            return $lista;

    }
    public function UpdateBloqueados(){
         $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM bloqueados where expirado = 0"
                );

                $stmt->execute();
                $lista = array();
                while($B = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Bloqueados = new BloqueadosModelo();
                    $Bloqueados->set(
                        $B['id_bloqueado'],
                        $B['id_usuario'],
                        $B['inicio'],
                        $B['fin'],
                        $B['expirado']
                    );
                    $lista[] = $Bloqueados;

                }

            $this->stop();
    }
 }
?>
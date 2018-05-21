<?php

    Class UsuarioControlador extends DBConexion {


        public function __construct(){}

        public function IniciarSesion(){

            if(isset($_POST["Correo"])){
                $this->start();
                $correo = $_POST["Correo"];
                $contrasena = $_POST["Password"];
                
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  correo  = '$correo' AND contrasena = sha('$contrasena')"
                );

                $stmt->execute();
                
                if($stmt->rowCount() > 0){ 
                    
                    $_SESSION['Correo']=$correo;
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id_usuario'] = $usuario["id_usuario"];
                    $_SESSION['tipo_usuario'] = $usuario["tipo_usuario"];



               if( $_SESSION['tipo_usuario']!=3){
                 if($_SESSION['tipo_usuario']==1){
                        $art = new ArtistaControlador();
                        $a = $art->ArtistaUsuario($usuario["id_usuario"]);
                       $_SESSION['id_artista']= $a->id_artista;
                    }

                header("Location: Control.php?c=Inicio&a=Inicio");
               }
               else{

                header("Location: Control.php?c=Moderador&a=Moderador");
               }
                }
                $this->stop();
           }  }

       

        public function cerrarSesion(){
            session_destroy();
            header("Location: usuario.php");
        }


       public function Registro(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

        }else{

        }
       }
        public function Configuracion(){
        }
        public function Usuario($id_usuario){
            $this->start();
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario where id_usuario = $id_usuario"
                );
                $stmt->execute();

                $Usuarios = new UsuarioModelo;
                $Usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                $Usuarios->set(
                        $Usuario["id_usuario"],
                        $Usuario["contrasena"],
                        $Usuario["correo"],
                        $Usuario["nombre_usuario"],
                        $Usuario["bloqueado"],
                        $Usuario["tipo_usuario"]
                    );

           

            $this->stop();
            return $Usuarios;
        }
        public function ValidarUsuario($nombre_usuario){
            if(isset($_SESSION['id_usuario'])){
                return null;
            }else{
                 $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  nombre_usuario = '$nombre_usuario'"
                );

                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    return 0;
                }else{
                    return 1;
                }
            }
        }
        public function validarCorreo($correo){
              $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  correp = '$correo'"
                );

                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    return 0;
                }else{
                    return 1;
                }
        }
    }
?>
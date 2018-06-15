<?php

    Class UsuarioControlador extends DBConexion {


        public function Pais(){
            $this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM pais");
                $stmt->execute();
                $lista = array();
                while($P = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Pais = new PaisModelo();
                    $Pais->set(
                        $P["id_pais"],
                        $P["nombre_pais"]
                    );
                    $lista[] = $Pais;
                }
              $this->stop();
            return $lista;
        }
        public function IniciarSesion(){

            if(isset($_POST["Correo"])){
                $this->start();
                $correo = $_POST["Correo"];
                $contrasena = $_POST["Password"];
                
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  correo  = '$correo' AND contrasena = sha('$contrasena') AND bloqueado = 0"
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
                 
                    $this->start();
                  $usuario = $_POST['Usuario'];
                    $correo = $_POST['Correo'];
                    $contrasena = $_POST['Contrasena'];
                    $Tipo = $_POST['TipoU'];
                    $Edad = $_POST['Edad'];
                    $Pais = $_POST['Pais'];

                   $stmt = $this->pdo->prepare(
                            "INSERT into usuario VALUES(NULL,sha('$contrasena'),'$correo','$usuario',0,$Tipo,0)"
                        );
                    $stmt->execute();
                    $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_usuario) as id FROM usuario"
                        );
                    $stmt->execute();
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id_usuario = $usuario["id"];
        
                    
        
                    if($Tipo == '1'){
                        if($_FILES["imagenA"]["name"]==''){
                        $imagen = null;
                    }else{
                        $folder="./Imagenes/imgPerfil/";
                        $tmp_name = $_FILES["imageAn"]["tmp_name"];
                        move_uploaded_file( $tmp_name,"$folder".$_FILES["imagenA"]["name"]);
                        $imagen = $folder.$_FILES["imagenA"]["name"];
                    }
                        $informacion = $_POST['InformacionA'];
                        $tecnica = $_POST['Tecnica'];
                        $Metas = $_POST['Metas'];
                        $Estudios = $_POST['Estudios'];
                        $Exper = $_POST['Exper'];
                        $Otro = $_POST['Otro'];
                        $Botones = $_POST['Botones'];
                        $Texto = $_POST['Texto'];
                        $Bordes = $_POST['Bordes'];
                        $Fondo = $_POST['Fondo'];
                        $Diseno = $_POST['Diseno'];
                        $di = new DisenoControlador();
                        $id_diseno = $di->Insert($Bordes,$Texto,$Botones,$Fondo,$Diseno);

                        $po = new PortafolioControlador();
                        $id_portafolio = $po->Insert();

                        $per = new PerfilControlador();
                        $id_perfil = $per->Insert($Metas,$Exper,$Otro,$Estudios);

                        $ar = new ArtistaControlador();
                        $a = $ar->Insert($Edad,$imagen,$infomracion,$tecnica,$Pais,$id_usuario,$id_diseno,$id_portafolio,$id_perfil);
                        
                        $_SESSION['id_artista'] = $a;

                    }else{
                        if($_FILES["imagenF"]["name"]==''){
                        $imagen = null;
                        }else{
                            $folder="./Imagenes/imgPerfil/";
                            $tmp_name = $_FILES["imagenF"]["tmp_name"];
                            move_uploaded_file( $tmp_name,"$folder".$_FILES["imagenF"]["name"]);
                            $imagen = $folder.$_FILES["imagenF"]["name"];
                        }
                        $fa = new FanControlador();
                        $f = $fa->Insert($Edad, $imagenF,$DatosFan, $Perfil,$Pais, $id_usuarip);
                        $_SESSION['id_fan'] = $f;
                    }
                        
                    
                    $_SESSION['Correo']=$correo;
                    $_SESSION['tipo_usuario']=$Tipo;
                    $_SESSION['id_usuario']=$id_usuario;
        
                     $this->stop();
                        header("Location: Control.php?c=Inicio&a=Inicio");
            }
        }
        public function Configuracion(){
              if($_SERVER['REQUEST_METHOD']=='POST'){
                    $this->start();
                    $usuario = $_POST['Usuario'];
                    $contrasena = $_POST['Contrasena'];
                    $Edad = $_POST['Edad'];
                    $Pais = $_POST['Pais'];
                    $id_usuario = $_SESSION['id_usuario'];
                    if($contrasena != ''){

                        $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET contrasena = sha('$contrasena') where id_usuario = $id_usuario "
                        );
                        $stmt->execute();

                    }
                      $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET  nombre_usuario = '$usuario' where id_usuario = $id_usuario "
                        );
                        $stmt->execute();
                    if($_FILES["imagenA"]["name"]==''){
                        $imagen = null;
                    }else{
                        $folder="./Imagenes/imgPerfil/";
                        $tmp_name = $_FILES["imageAn"]["tmp_name"];
                        move_uploaded_file( $tmp_name,"$folder".$_FILES["imagenA"]["name"]);
                        $imagen = $folder.$_FILES["imagenA"]["name"];
                    }
                    if($_SESSION['tipo_usuario']==1){
                        $informacion = $_POST['InformacionA'];
                        $tecnica = $_POST['Tecnica'];
                        $Metas = $_POST['Metas'];
                        $Estudios = $_POST['Estudios'];
                        $Exper = $_POST['Exper'];
                        $Otro = $_POST['Otro'];
                        $Botones = $_POST['Botones'];
                        $Texto = $_POST['Texto'];
                        $Bordes = $_POST['Bordes'];
                        $Fondo = $_POST['Fondo'];
                        $Diseno = $_POST['Diseno'];

                    $artista = new ArtistaControlador();
                    $a = $artista->ArtistaUsuario($id_usuario);

                    $artista->Update($Edad,$imagen,$informacion,$tecnica,$Pais,$a->id_artista);

                    $di = new DisenoControlador();
                    $di->Update($Bordes,$Texto,$Botones,$Fondo,$Diseno,$a->id_diseno);


                    $per = new PerfilControlador();
                    $per->Update($Metas,$Exper,$Otro,$Estudios,$a->id_perfil);

                }else{

                }
                   $this->stop();                     

                }
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
                        $Usuario["tipo_usuario"],
                        $Usuario["permitir_18"]
                    );

           

            $this->stop();
            return $Usuarios;
        }
        public function ValidarUsuario(){
            $this->start();
            $nombre_usuario=$_POST['Usuario'];
            if(isset($_SESSION['id_usuario'])){
                $id_usuario = $_SESSION['id_usuario'];
                 $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  nombre_usuario = '$nombre_usuario' and id_usuario != $id_usuario"
                );
                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    echo "0";
                }else{
                    echo "1";
                }
            }else{

                 $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  nombre_usuario = '$nombre_usuario'"
                );
                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    echo "0";
                }else{
                    echo "1";
                }
            }
            $this->stop();
        }
        public function ValidarCorreo(){
            $this->start();
            $correo=$_POST['Correo'];
              $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  correo = '$correo'"
                );

                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    echo "0";
                }else{
                    echo "1";
                }
            $this->stop();
        }
        public function ValidarContrasena(){
            $this->start();
            $contrasena =$_POST['ContraA'];
            $id_usuario = $_SESSION['id_usuario'];
              $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario WHERE  contrasena =  sha('$contrasena') and id_usuario = $id_usuario"
                );

                $stmt->execute();
                if($stmt->rowCount() > 0){ 
                    echo "0";
                }else{
                    echo "1";
                }
            $this->stop();
        }
        public function CambiarContrasena($idk){
            $this->start();
                $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET contrasena = sha('$contrasena') where idk  = $idk "
                        );
                        $stmt->execute();
            $this->stop();
        }
        public function MayoriaEdad(){
            $this->start();
                $stmt = $this->pdo->prepare(
                            "SELECT * from  usuario where contenido_explicito = 0"
                        );
                $stmt->execute();

            $thid->stop();

        }
        public function ContenidoOculto(){
              $this->start();
                $stmt = $this->pdo->prepare(
                            "SELECT * from  usuario where  permitir_18 = 1"
                        );
                $stmt->execute();
                $lista = array();
                while($Usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Usuarios = new UsuarioModelo;
                    
                    $Usuarios->set(
                        $Usuario["id_usuario"],
                        $Usuario["contrasena"],
                        $Usuario["correo"],
                        $Usuario["nombre_usuario"],
                        $Usuario["bloqueado"],
                        $Usuario["tipo_usuario"],
                        $Usuario["permitir_18"]
                    );
                    $lista[] = $Usuarios;
                }
            $thid->stop();
            return $lista;
        }
    }
?>
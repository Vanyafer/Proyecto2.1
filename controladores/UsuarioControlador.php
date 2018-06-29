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
        public function Estado(){
             $this->start();
                $stmt = $this->pdo->prepare("SELECT * FROM estado");
                $stmt->execute();
                $lista = array();
                while($M = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Estado = new EstadoModelo();
                    $Estado->set(
                        $M['id_estado'],
                        $M["id_pais"],
                        $M["estado"]
                    );
                    $lista[] = $Estado;
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
                    "SELECT * FROM usuario WHERE  correo  = '$correo' AND contrasena = sha('$contrasena')"
                );

                $stmt->execute();
    
                if($stmt->rowCount() > 0){ 

                    
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($usuario['bloqueado'] == 0){
                    $_SESSION['Correo']=$correo;
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
               }else{
                
               }
                }else{
                    header("Location: Usuario.php");
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
                    $estado = $_POST['Estado'];
                     if($Tipo == '1'){
                        if($_FILES["imagen"]["name"]==''){
                        $imagen = null;
                    }else{
                        $folder="./Imagenes/imgPerfil/";
                        $tmp_name = $_FILES["imagen"]["tmp_name"];
                        move_uploaded_file( $tmp_name,"$folder".$_FILES["imagenA"]["name"]);
                        $imagen = $folder.$_FILES["imagen"]["name"];
                    }
                   $stmt = $this->pdo->prepare(
                            "INSERT into usuario VALUES(NULL,sha('$contrasena'),'$correo','$usuario','$imagen','$Edad',$Pais,$estado,0,$Tipo,0,0,0,0,0,0)"
                        );
                    $stmt->execute();
                    $stmt = $this->pdo->prepare(
                            "SELECT MAX(id_usuario) as id FROM usuario"
                        );
                    $stmt->execute();
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id_usuario = $usuario["id"];
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
                        $a = $ar->Insert($informacion,$tecnica,$id_usuario,$id_diseno,$id_portafolio,$id_perfil);
                        
                        $_SESSION['id_artista'] = $a;

                    }else{
                        $DatosFan = $_POST['DatosFan'];
                        $PerfilF = $_POST['PerfilFan'];
                        
                        $fa = new FanControlador();

                        $f = $fa->Insert($DatosFan,$PerfilF,$id_usuario);
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
                    $Estado = $_POST['Estado'];
                    $id_usuario = $_SESSION['id_usuario'];
                    if(isset($_SESSION['permitir_18'])):$permitir_18 = $_SESSION['permitir_18'];else:$permitir_18 = 1;endif;
                    if($_FILES["imagenA"]["name"]==''){
                        $imagen = null;
                    }else{
                        $folder="./Imagenes/imgPerfil/";
                        $tmp_name = $_FILES["imageAn"]["tmp_name"];
                        move_uploaded_file( $tmp_name,"$folder".$_FILES["imagenA"]["name"]);
                        $imagen = $folder.$_FILES["imagenA"]["name"];
                    }

                    if($contrasena != ''){

                        $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET contrasena = sha('$contrasena') where id_usuario = $id_usuario "
                        );
                        $stmt->execute();

                    }
                      $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET  imagen_perfil = '$imagen',nombre_usuario = '$usuario', fn = '$Edad', pais = $Pais, estado = $Estado, permitir_18 = $permitir_18 where id_usuario = $id_usuario "
                        );
                        $stmt->execute();
                    
                    if($_SESSION['tipo_usuario']==1){
                        $informacion = $_POST['InformacionA'];
                        $tecnica = $_POST['Tecnica'];
                        $Metas = $_POST['Metas'];
                        $Estudios = $_POST['Estudios'];
                        $Exper = $_POST['Exper'];
                        $Otro = $_POST['Otro'];
                        $Botones = $_POST['btn'];
                        $Texto = $_POST['input'];
                        $Bordes = $_POST['navbar'];
                        $Fondo = $_POST['bg'];
                        $Diseno = $_POST['Diseno'];


                    $artista = new ArtistaControlador();
                    $a = $artista->ArtistaUsuario($id_usuario);

                    $artista->Update($informacion,$tecnica,$a->id_artista);


                    $per = new PerfilControlador();
                    $per->Update($Metas,$Exper,$Otro,$Estudios,$a->id_perfil);



                    $di = new DisenoControlador();
                    $di->Update($Bordes,$Texto,$Botones,$Fondo,$Diseno,$a->id_diseno);

                        echo "1";

                }else{
                    echo "1";
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
                        $Usuario["imagen_perfil"],
                        $Usuario["fn"],
                        $Usuario["pais"],
                        $Usuario["estado"],
                        $Usuario["bloqueado"],
                        $Usuario["tipo_usuario"],
                        $Usuario["permitir_18"],
                        $Usuario["reset"],
                        $Usuario["auto5"],
                        $Usuario["auto10"],
                        $Usuario["auto15"],
                        $Usuario["auto20"]
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
        public function CambiarContrasena(){
            $this->start();
                $id_usuario = $_POST['id_usuario'];
                $contrasena = $_POST['contrasena'];
                $stmt = $this->pdo->prepare(
                            "UPDATE usuario SET contrasena = sha('$contrasena') where id_usuario  = $id_usuario "
                        );
                        $stmt->execute();
            $this->stop();
        }

        public function UsuariosRecomendadosEstado(){
            $this->start();
                $us = new UsuarioControlador();
                $u = $us->Usuario($_SESSION['id_usuario']);

                $stmt = $this->pdo->prepare(
                            "SELECT * from usuario where estado = $u->estado"//cambiar a estado
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
                            $Usuario["imagen_perfil"],
                            $Usuario["fn"],
                            $Usuario["pais"],
                            $Usuario["estado"],
                            $Usuario["bloqueado"],
                            $Usuario["tipo_usuario"],
                            $Usuario["permitir_18"],
                            $Usuario["reset"],
                            $Usuario["auto5"],
                            $Usuario["auto10"],
                            $Usuario["auto15"],
                            $Usuario["auto20"]
                        );
                    $lista[] = $Usuarios;
                }
            $this->stop();
            return $lista;
        }
        
        public function UsuariosRecomendadosTecnica(){
            $palabras = array("con","la","el","lo","los","un","unos","de","y","del","que","yo","a","e","mi","usando","tecnica","todos","sobre","en",);

            $this->start();
                $Artista = new ArtistaControlador();
                $a = $Artista->ArtistaUsuario($_SESSION['id_usuario']);
                $delimiters = array(",",".","|",":"," ");
                $ready = str_replace($delimiters, $delimiters[0], $a->tecnica_interes);
                $tecnica = explode($delimiters[0], $ready);

               for ($i=0; $i < sizeof($tecnica) + 2; $i++) { 
                   if(in_array($tecnica[$i], $palabras) or $tecnica[$i]==""){
                        unset($tecnica[$i]);
                    }else{
                         $tecnica[$i] = substr( $tecnica[$i], 0, -3); 
                        $tecnica[$i] = "'%".$tecnica[$i]."%'";
                    }
               }
               

                $tecnicas = implode(' OR tecnica_interes LIKE ', $tecnica);
                $stmt = $this->pdo->prepare(
                            "SELECT * FROM usuario WHERE id_usuario IN (SELECT id_usuario FROM artista WHERE tecnica_interes LIKE {$tecnicas} ) "
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
                            $Usuario["imagen_perfil"],
                            $Usuario["fn"],
                            $Usuario["pais"],
                            $Usuario["estado"],
                            $Usuario["bloqueado"],
                            $Usuario["tipo_usuario"],
                            $Usuario["permitir_18"],
                            $Usuario["reset"],
                            $Usuario["auto5"],
                            $Usuario["auto10"],
                            $Usuario["auto15"],
                            $Usuario["auto20"]
                        );
                    $lista[] = $Usuarios;
                }
            $this->stop();
            return $lista;
        }
       public function Edad($id_usuario){
         $this->start();
                
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM usuario where id_usuario = $id_usuario"
                );
                $stmt->execute();

                $Usuarios = new UsuarioModelo;
                $Usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                $fn = $Usuario["fn"];
                $hoy = new DateTime();
                $fn = new DateTime($fn);
                $annos = $hoy->diff($fn);

            $this->stop();
            return $annos->y;
       }
    }
?>
<?php
 Class BuscarControlador extends DBConexion{

 	public function Buscar(){}

    public function BuscarUsuario($usuario){
        $this->start();
        $stmt = $this->pdo->prepare(
                            "SELECT * from usuario where nombre_usuario  LIKE '%$usuario%' and tipo_usuario != 3 "
                        );
                $stmt->execute();
                $lista = array();
                while($Usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $Usuarios = new UsuarioModelo();
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
    public function BuscarPublicacion($palabra){
        $this->start();
        $Usuarios = new UsuarioControlador();
                $u = $Usuarios->Usuario($_SESSION['id_usuario']);
                if($u->permitir_18==1){
                     $c = "0,1";
                }else{
                     $c = "0";
                }
        $stmt = $this->pdo->prepare(
                    "SELECT * FROM publicacion where ocultar = 0 and contenido_explicito  in ($c) and privacidad = 0 and (contenido LIKE '%$palabra%' or etiquetas LIKE '%$palabra%') order by id_publicacion DESC"
                );
                $stmt->execute();

                $lista = array();
                while($Publicacion = $stmt->fetch(PDO::FETCH_ASSOC)){
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

            }
        $this->stop();
        return $lista;
    }
 }
?>
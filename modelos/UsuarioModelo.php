<?php

    Class UsuarioModelo {

        public $id_usuario;
        public $contrasena;
        public $correo;
        public $nombre_usuario;
        public $bloqueado;
        public $tipo_usuario;

        public function __construct(){

        }
      
        public function set( $id_usuario, $contrasena, $correo, $nombre_usuario, $bloqueado , $tipo_usuario){
            $this->id_usuario = $id_usuario;
            $this->contrasena = $contrasena;
            $this->correo = $correo;
            $this->correo = $nombre_usuario;
            $this->nombre_usuario = $nombre_usuario;
            $this->bloqueado = $bloqueado;
            $this->tipo_usuario = $tipo_usuario;
        }

    }

?>
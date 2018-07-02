<?php

    Class UsuarioModelo {

        public $id_usuario;
        public $contrasena;
        public $correo;
        public $nombre_usuario;
        public $imagen_perfil;
        public $fn;
        public $pais;
        public $estado;
        public $bloqueado;
        public $tipo_usuario;
        public $permitir_18;
        public $reset;
        public $auto5;
        public $auto10;
        public $auto15;
        public $auto20;


        public function set( $id_usuario, $contrasena, $correo, $nombre_usuario, $imagen_perfil, $fn, $pais, $estado, $bloqueado , $tipo_usuario, $permitir_18, $reset, $auto5, $auto10, $auto15, $auto20){
            $this->id_usuario = $id_usuario;
            $this->contrasena = $contrasena;
            $this->correo = $correo;
            $this->correo = $nombre_usuario;
            $this->nombre_usuario = $nombre_usuario;
            $this->imagen_perfil = $imagen_perfil;
            $this->fn = $fn;
            $this->pais = $pais;
            $this->estado = $estado;
            $this->bloqueado = $bloqueado;
            $this->tipo_usuario = $tipo_usuario;
            $this->permitir_18 = $permitir_18;
            $this->reset = $reset;
            $this->auto5 = $auto5;
            $this->auto10 = $auto10;
            $this->auto15 = $auto15;
            $this->auto20 = $auto20;
        }

    }

?>
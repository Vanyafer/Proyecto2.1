<?php 
		Class ArtistaModelo {

        public $id_artista;
        public $informacion_contacto;
        public $tecnica_interes;
        public $id_usuario;
        public $id_diseno;
        public $id_portafolio;
        public $id_perfil;

        public function __construct(){

        }

        public function set( $id_artista, $informacion_contacto, $tecnica_interes, $id_usuario, $id_diseno, $id_portafolio, $id_perfil){
        	$this->id_artista = $id_artista;
        	$this->informacion_contacto = $informacion_contacto;
        	$this->tecnica_interes = $tecnica_interes;
            $this->id_usuario = $id_usuario;
            $this->id_diseno = $id_diseno;
            $this->id_portafolio = $id_portafolio;
            $this->id_perfil = $id_perfil;
        }

    }
?>
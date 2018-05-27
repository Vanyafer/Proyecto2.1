<?php
	class RetoAceptadoModelo{
		public $id_aceptado;
		public $id_artista;
		public $id_reto;

		  public function __construct(){

        }

        public function set(  $id_aceptado, $id_artista, $id_reto){
        	$this->id_aceptado = $id_aceptado;
        	$this->id_artista = $id_artista;
        	$this->id_reto = $id_reto;        
        }
	}
?>
<?php
	class PortafolioModelo{
		public $id_portafolio;
		public $descripcion;

        public function set(  $id_portafolio, $descripcion){
        	$this->id_portafolio = $id_portafolio;
        	$this->descripcion = $descripcion;
        }
	}
?>
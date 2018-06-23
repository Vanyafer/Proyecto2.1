<?php
	class ForoModelo{
		public $id_forohilo;
		public $fecha;
		public $contenido;
		public $titulo;
		public $id_forotipo;
		public $id_usuario;
		public $ocultar;


        public function set(  $id_forohilo, $fecha, $contenido, $titulo, $id_forotipo, $id_usuario, $ocultar){
        	$this->id_forohilo = $id_forohilo;
        	$this->fecha = $fecha;
        	$this->contenido = $contenido;
        	$this->titulo = $titulo;
        	$this->id_forotipo = $id_forotipo;
            $this->id_usuario = $id_usuario;
            $this->ocultar = $ocultar;
        }
	}
?>
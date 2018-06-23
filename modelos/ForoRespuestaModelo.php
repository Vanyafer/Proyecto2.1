<?php
	class ForoRespuestaModelo{
		public $id_fororespuesta;
		public $fecha;
		public $contenido;
		public $id_forohilo;
		public $id_usuario;
		public $ocultar;

        public function set(  $id_fororespuesta, $fecha, $contenido, $id_forohilo, $id_usuario, $ocultar){
        	$this->id_fororespuesta = $id_fororespuesta;
        	$this->fecha = $fecha;
        	$this->contenido = $contenido;
        	$this->id_forohilo = $id_forohilo;
            $this->id_usuario = $id_usuario;
            $this->ocultar = $ocultar;
            
        }
	}
?>
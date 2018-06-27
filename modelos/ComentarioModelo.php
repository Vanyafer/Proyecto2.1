<?php
	class ComentarioModelo{
		public $id_comentario;
		public $fecha;
		public $contenido;
		public $id_usuario;
		public $id_publicacion;
		public $ocultar;

        public function set(  $id_comentario, $fecha, $contenido, $id_usuario, $id_publicacion,$ocultar){
        	$this->id_comentario = $id_comentario;
        	$this->fecha = $fecha;
        	$this->contenido = $contenido;
            $this->id_usuario = $id_usuario;
            $this->id_publicacion = $id_publicacion;
            $this->ocultar = $ocultar;
        }
	}
?>
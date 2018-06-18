<?php 
	Class NotificacionesModelo{

        public $id_notificacion;
        public $tipo;
        public $contenido;
        public $id_usuario;
        public $visto;
        public $fecha;
        public $id_evento;
        public $id_usuario1;


        public function set( $id_notificacion, $tipo, $contenido, $id_usuario, $visto, $fecha, $id_evento, $id_usuario1){
        	$this->id_notificacion = $id_notificacion;
        	$this->tipo = $tipo;
        	$this->contenido = $contenido;
        	$this->id_usuario = $id_usuario;
        	$this->visto = $visto;
            $this->fecha = $fecha;
            $this->id_evento = $id_evento;
            $this->id_usuario1 = $id_usuario1;
        }

    }
	
?>
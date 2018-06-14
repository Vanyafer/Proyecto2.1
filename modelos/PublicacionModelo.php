<?php 
 class PublicacionModelo extends DBConexion{
 		public $id_publicacion;
        public $fecha;
        public $contenido_explicito;
        public $contenido;
        public $etiquetas;
        public $privacidad;
        public $imagen;
        public $id_artista;
        public $ocultar;

       
        public function set( $id_publicacion,$fecha, $contenido_explicito,$contenido,$etiquetas,$privacidad,$imagen,$id_artista,$ocultar){
            $this->id_publicacion = $id_publicacion;
            $this->fecha = $fecha;
            $this->contenido_explicito = $contenido_explicito;
            $this->contenido = $contenido;
            $this->etiquetas = $etiquetas;
            $this->privacidad = $privacidad;
            $this->imagen = $imagen;
            $this->id_artista = $id_artista;
            $this->ocultar = $ocultar;
        }

 }
?>
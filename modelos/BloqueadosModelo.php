<?php 
 class BloqueadosModelo{
 	public $id_bloqueado;
        public $id_usuario;
        public $inicio;
        public $fin;
        public $expirado;

        public function set($id_bloqueado, $id_usuario, $inicio, $fin, $expirado){
        	$this->id_bloqueado = $id_bloqueado;
        	$this->id_usuario = $id_usuario;
        	$this->inicio = $inicio;
        	$this->fin = $fin;
        	$this->expirado = $expirado;
        	
        }
 }
?>
<?php

    Class EstadoModelo {

        public $id_estado;
        public $id_pais;
        public $estado;
      
        public function set( $id_estado, $id_pais,$estado){
            $this->id_estado = $id_estado;
            $this->id_pais = $id_pais;
            $this->estado = $estado;
        }

    }

?>
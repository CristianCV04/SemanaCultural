<?php

    class Visita {

        private $idVisita;
		private $Usuario_idUsuario;
		private $ingreso;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
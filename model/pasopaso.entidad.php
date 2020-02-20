<?php

    class PasoPaso {

        private $idPasoPaso;
		private $Evento_idEvento;
        private $descripcion;
        private $tiempo;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
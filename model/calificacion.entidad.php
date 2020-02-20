<?php

    class Calificacion {

        private $idCalificacion;
		private $Usuario_idUsuario;
		private $Evento_idEvento;
        private $calificacion;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
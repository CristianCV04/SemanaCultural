<?php

    class Restauracion {

        private $idRestauracion;
		private $Usuario_idUsuario;
        private $email;
        private $token;
        private $subida;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
<?php

    class MensajeChat {

        private $idMensajeChat;
		private $Usuario_idUsuario;
		private $Chat_idChat;
        private $mensaje;
        private $subida;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
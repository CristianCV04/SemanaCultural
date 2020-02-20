<?php

    class Notificacion {

        private $idNotificacion;
        private $Usuario_idUsuario;
		private $Evento_idEvento;
        private $PasoPaso_idPasoPaso;
        private $vista;
        private $subida;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
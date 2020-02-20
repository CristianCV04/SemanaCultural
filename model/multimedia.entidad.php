<?php

    class Multimedia {

        private $idMultimedia;
		private $Usuario_idUsuario;
		private $Evento_idEvento;
		private $TipoMultimedia_idTipoMultimedia;
        private $nombre;
		private $descripcion;
        private $subida;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
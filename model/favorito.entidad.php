<?php

    class Favorito {

        private $idFavorito;
		private $Usuario_idUsuario;
		private $Evento_idEvento;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
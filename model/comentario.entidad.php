<?php

    class Comentario {

        private $idComentario;
		private $Usuario_idUsuario;
		private $Evento_idEvento;
		private $Comentario_idComentario;
		private $comentario;
        private $subida;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
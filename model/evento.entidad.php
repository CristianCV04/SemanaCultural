<?php

    class Evento {

        private $idEvento;
		private $Programacion_idProgramacion;
		private $Lugar_idLugar;
		private $nombre;
		private $descripcion;
        private $inicio;
        private $fin;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
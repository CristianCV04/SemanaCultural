<?php

    class Usuario {

        private $idUsuario;
		private $TipoUsuario_idTipoUsuario;
		private $nombres;
		private $apellido1;
		private $apellido2;
		private $username;
		private $password;
        private $email;
        private $bloqueado;
        private $confirmado;

        public function __GET($k) { 
            return $this->$k; 
        }
        
        public function __SET($k, $v) { 
            return $this->$k = $v; 
        }
        
    }

?>
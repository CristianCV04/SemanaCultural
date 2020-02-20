<?php

    require_once('../model/tipousuario.entidad.php');
    require_once('../model/tipousuario.model.php');

    class TipoUsuarioController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new TipoUsuarioModel();
        }
        
        public function CrearTipoUsuario($nombre) {
            $TipoUsuario = new TipoUsuarioModel();
            $TipoUsu = $TipoUsuario->Crear($nombre);
            return $TipoUsu;
        }
    
        public function ListarTipoUsuario() {
            $TipoUsuario = new TipoUsuarioModel();
            $TipoUsu = $TipoUsuario->Listar();
            return $TipoUsu;
        }
    
        public function Listar1TipoUsuario($idTipoUsuario) {
            $TipoUsuario = new TipoUsuarioModel();
            $TipoUsu = $TipoUsuario->Listar1($idTipoUsuario);
            return $TipoUsu;
        }
    
        public function VerTipoUsuario($idTipoUsuario) {
            $TipoUsuario = new TipoUsuarioModel();
            $TipoUsu = $TipoUsuario->Ver($idTipoUsuario);
            return $TipoUsu;
        }
    
        public function ModificarTipoUsuario($idTipoUsuario, $nombre) { 
            $TipoUsuario = new TipoUsuarioModel(); 
            $TipoUsu = $TipoUsuario->Modificar($idTipoUsuario, $nombre);
            return $TipoUsu;
        }
        
        public function EliminarTipoUsuario($idTipoUsuario) {
            $TipoUsuario = new TipoUsuarioModel();
            $TipoUsu = $TipoUsuario->Eliminar($idTipoUsuario);
            return $TipoUsu;
        }
        
    }

?>
<?php

    require_once('../model/usuario.entidad.php');
    require_once('../model/usuario.model.php');

    class UsuarioController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new UsuarioModel();
        }
    
        public function CrearUsuario($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $password, $email) {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->Crear($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $password, $email);
            return $Usu;
        }
    
        public function ListarUsuario($idUsuario) {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->Listar($idUsuario);
            return $Usu;
        }
    
        public function ContarUsuario() {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->Contar();
            return $Usu;
        }
        
        public function VerUsuario($idUsuario) {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->Ver($idUsuario);
            return $Usu;
        }
        
        public function VerUsuarioByUsername($username) {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->VerByUsername($username);
            return $Usu;
        }
        
        public function ModificarUsuario($idUsuario, $TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $email) { 
            $Usuario = new UsuarioModel(); 
            $Usu = $Usuario->Modificar($idUsuario, $TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $email);
            return $Usu;
        }
        
        public function ModificarPerfilUsuario($idUsuario, $nombres, $apellido1, $apellido2, $username) { 
            $Usuario = new UsuarioModel(); 
            $Usu = $Usuario->ModificarPerfil($idUsuario, $nombres, $apellido1, $apellido2, $username);
            return $Usu;
        }
        
        public function CambiarPasswordUsuario($idUsuario, $password) {
            $Usuario = new UsuarioModel(); 
            $Usu = $Usuario->CambiarPassword($idUsuario, $password);
            return $Usu;
        }
        
        public function BloquearUsuario($idUsuario, $bloqueado) {
            $Usuario = new UsuarioModel(); 
            $Usu = $Usuario->Bloquear($idUsuario, $bloqueado);
            return $Usu;
        }
        
        public function ConfirmarUsuario($idUsuario) {
            $Usuario = new UsuarioModel(); 
            $Usu = $Usuario->Confirmar($idUsuario);
            return $Usu;
        }
        
        public function EliminarUsuario($idUsuario) {
            $Usuario = new UsuarioModel();
            $Usu = $Usuario->Eliminar($idUsuario);
            return $Usu;
        }
        
    }

?>
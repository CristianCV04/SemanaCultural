<?php

    require_once('../model/notificacion.entidad.php');
    require_once('../model/notificacion.model.php');

    class NotificacionController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new NotificacionModel();
        }
        
        public function CrearNotificacion($Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Crear($Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso);
            return $Noti;
        }
    
        public function ListarNotificacion() {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Listar();
            return $Noti;
        }
        
        public function ContarNotificacion($Usuario_idUsuario) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Contar($Usuario_idUsuario);
            return $Noti;
        }
        
        public function ListarNotificacionVista() {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->ListarVista();
            return $Noti;
        }
    
        public function VerNotificacion($idNotificacion) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Ver($idNotificacion);
            return $Noti;
        }
        
        public function NotificacionVista($idNotificacion) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Vista($idNotificacion);
            return $Noti;
        }
        
        public function VerNotificacionByUsuario($Usuario_idUsuario) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->VerByUsuario($Usuario_idUsuario);
            return $Noti;
        }
    
        public function ModificarNotificacion($idNotificacion, $Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso, $vista) { 
            $Notificacion = new NotificacionModel(); 
            $Noti = $Notificacion->Modificar($idNotificacion, $Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso, $vista);
            return $Noti;
        }
        
        public function EliminarNotificacion($idNotificacion) {
            $Notificacion = new NotificacionModel();
            $Noti = $Notificacion->Eliminar($idNotificacion);
            return $Noti;
        }
        
    }

?>
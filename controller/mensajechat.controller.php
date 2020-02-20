<?php

    require_once('../model/mensajechat.entidad.php');
    require_once('../model/mensajechat.model.php');

    class MensajeChatController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new MensajeChatModel();
        }
        
        public function CrearMensajeChat($Usuario_idUsuario, $Chat_idChat, $mensaje) {
            $MensajeChat = new MensajeChatModel();
            $MsjChat = $MensajeChat->Crear($Usuario_idUsuario, $Chat_idChat, $mensaje);
            return $MsjChat;
        }
    
        public function ListarMensajeChat() {
            $MensajeChat = new MensajeChatModel();
            $MsjChat = $MensajeChat->Listar();
            return $MsjChat;
        }
    
        public function VerMensajeChat($idMensajeChat) {
            $MensajeChat = new MensajeChatModel();
            $MsjChat = $MensajeChat->Ver($idMensajeChat);
            return $MsjChat;
        }
    
        public function ModificarMensajeChat($idMensajeChat, $Usuario_idUsuario, $Chat_idChat, $mensaje, $subida) { 
            $MensajeChat = new MensajeChatModel(); 
            $MsjChat = $MensajeChat->Modificar($idMensajeChat, $Usuario_idUsuario, $Chat_idChat, $mensaje, $subida);
            return $MsjChat;
        }
        
        public function EliminarMensajeChat($idMensajeChat) {
            $MensajeChat = new MensajeChatModel();
            $MsjChat = $MensajeChat->Eliminar($idMensajeChat);
            return $MsjChat;
        }
        
    }

?>
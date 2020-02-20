<?php

    require_once('../model/chat.entidad.php');
    require_once('../model/chat.model.php');

    class ChatController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new ChatModel();
        }
        
        public function CrearChat($nombre) {
            $Chat = new ChatModel();
            $Ch = $Chat->Crear($nombre);
            return $Ch;
        }
    
        public function ListarChat() {
            $Chat = new ChatModel();
            $Ch = $Lugar->Listar();
            return $Ch;
        }
    
        public function VerChat($idChat) {
            $Chat = new ChatModel();
            $Ch = $Chat->Ver($idChat);
            return $Ch;
        }
    
        public function ModificarChat($idChat, $nombre) { 
            $Chat = new ChatModel(); 
            $Ch = $Chat->Modificar($idChat, $nombre);
            return $Ch;
        }
        
        public function EliminarChat($idChat) {
            $Chat = new ChatModel();
            $Ch = $Chat->Eliminar($idChat);
            return $Ch;
        }
        
    }

?>
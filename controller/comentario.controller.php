<?php

    require_once('../model/comentario.entidad.php');
    require_once('../model/comentario.model.php');

    class ComentarioController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new ComentarioModel();
        }
        
        public function CrearComentario($Usuario_idUsuario, $Evento_idEvento, $comentario) {
            $Comentario = new ComentarioModel();
            $Com = $Comentario->Crear($Usuario_idUsuario, $Evento_idEvento, $comentario);
            return $Com;
        }
    
        public function ListarComentario() {
            $Comentario = new ComentarioModel();
            $Com = $Comentario->Listar();
            return $Com;
        }
    
        public function VerComentario($idComentario) {
            $Comentario = new ComentarioModel();
            $Com = $Comentario->Ver($idComentario);
            return $Com;
        }
        
        public function VerComentarioByEvento($Evento_idEvento) {
            $Comentario = new ComentarioModel();
            $Com = $Comentario->VerByEvento($Evento_idEvento);
            return $Com;
        }
    
        public function ModificarComentario($idComentario, $Usuario_idUsuario, $Evento_idEvento, $Comentario_idComentario, $comentario, $subida) { 
            $Comentario = new ComentarioModel(); 
            $Com = $Comentario->Modificar($idComentario, $Usuario_idUsuario, $Evento_idEvento, $Comentario_idComentario, $comentario, $subida);
            return $Com;
        }
        
        public function EliminarComentario($idComentario) {
            $Comentario = new ComentarioModel();
            $Com = $Comentario->Eliminar($idComentario);
            return $Com;
        }
        
    }

?>
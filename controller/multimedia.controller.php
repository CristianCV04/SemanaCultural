<?php

    require_once('../model/multimedia.entidad.php');
    require_once('../model/multimedia.model.php');

    class MultimediaController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new MultimediaModel();
        }
        
        public function CrearMultimedia($Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida) {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->Crear($Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida);
            return $Multi;
        }
    
        public function ListarMultimedia() {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->Listar();
            return $Multi;
        }
    
        public function VerMultimedia($idMultimedia) {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->Ver($idMultimedia);
            return $Multi;
        }
        
        public function VerImagenesByEvento($Evento_idEvento) {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->VerImagen($Evento_idEvento);
            return $Multi;
        }
        
        public function VerVideosByEvento($Evento_idEvento) {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->VerVideo($Evento_idEvento);
            return $Multi;
        }
    
        public function ModificarMultimedia($idMultimedia, $Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida) { 
            $Multimedia = new MultimediaModel(); 
            $Multi = $Multimedia->Modificar($idMultimedia, $Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida);
            return $Multi;
        }
        
        public function EliminarMultimedia($idMultimedia) {
            $Multimedia = new MultimediaModel();
            $Multi = $Multimedia->Eliminar($idMultimedia);
            return $Multi;
        }
        
    }

?>
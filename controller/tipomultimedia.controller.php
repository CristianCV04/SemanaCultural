<?php

    require_once('../model/tipomultimedia.entidad.php');
    require_once('../model/tipomultimedia.model.php');

    class TipoMultimediaController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new TipoMultimediaModel();
        }
        
        public function CrearTipoMultimedia($nombre) {
            $TipooMultimedia = new TipoMultimediaModel();
            $TipoMulti = $TipoMultimedia->Crear($nombre);
            return $TipoMulti;
        }
    
        public function ListarTipoMultimedia() {
            $TipoMultimedia = new TipoMultimediaModel();
            $TipoMulti = $TipoMultimedia->Listar();
            return $TipoMulti;
        }
    
        public function VerTipoMultimedia($idTipoMultimedia) {
            $TipoMultimedia = new TipoMultimediaModel();
            $TipoMulti = $TipoMultimedia->Ver($idTipoMultimedia);
            return $TipoMulti;
        }
    
        public function ModificarTipoMultimedia($idTipoMultimedia, $nombre) { 
            $TipoMultimedia = new TipoMultimediaModel(); 
            $TipoMulti = $TipoMultimedia->Modificar($idTipoMultimedia, $nombre);
            return $tipomultimedia;
        }
        
        public function EliminarTipoMultimedia($idTipoMultimedia) {
            $TipoMultimedia = new TipoMultimediaModel();
            $TipoMulti = $TipoMultimedia->Eliminar($idTipoMultimedia);
            return $TipoMulti;
        }
        
    }

?>
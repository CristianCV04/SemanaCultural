<?php

    require_once('../model/lugar.entidad.php');
    require_once('../model/lugar.model.php');

    class LugarController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new LugarModel();
        }
        
        public function CrearLugar($nombre) {
            $Lugar = new LugarModel();
            $Lug = $Lugar->Crear($nombre);
            return $Lug;
        }
    
        public function ListarLugar() {
            $Lugar = new LugarModel();
            $Lug = $Lugar->Listar();
            return $Lug;
        }
    
        public function Listar1Lugar($idLugar) {
            $Lugar = new LugarModel();
            $Lug = $Lugar->Listar1($idLugar);
            return $Lug;
        }
    
        public function VerLugar($idLugar) {
            $Lugar = new LugarModel();
            $Lug = $Lugar->Ver($idLugar);
            return $Lug;
        }
    
        public function ModificarLugar($idLugar, $nombre) { 
            $Lugar = new LugarModel(); 
            $Lug = $Lugar->Modificar($idLugar, $nombre);
            return $Lug;
        }
        
        public function EliminarLugar($idLugar) {
            $Lugar = new LugarModel();
            $Lug = $Lugar->Eliminar($idLugar);
            return $Lug;
        }
        
    }

?>
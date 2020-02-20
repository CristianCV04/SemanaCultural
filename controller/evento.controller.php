<?php

    require_once('../model/evento.entidad.php');
    require_once('../model/evento.model.php');

    class EventoController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new EventoModel();
        }
        
        public function CrearEvento($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin) {
            $Evento = new EventoModel();
            $Eve = $Evento->Crear($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin);
            return $Eve;
        }
    
        public function ListarDistincEvento() {
            $Evento = new EventoModel();
            $Eve = $Evento->ListarDistinc();
            return $Eve;
        }
        
        public function ListarEvento($inicio) {
            $Evento = new EventoModel();
            $Eve = $Evento->Listar($inicio);
            return $Eve;
        }
        
        public function ListarAllEvento() {
            $Evento = new EventoModel();
            $Eve = $Evento->ListarAll();
            return $Eve;
        }
    
        public function ListarEventoPermanente() {
            $Evento = new EventoModel();
            $Eve = $Evento->ListarPermanente();
            return $Eve;
        }
        
        public function VerEvento($idEvento) {
            $Evento = new EventoModel();
            $Eve = $Evento->Ver($idEvento);
            return $Eve;
        }
    
        public function ModificarEvento($idEvento, $Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin) { 
            $Evento = new EventoModel(); 
            $Eve = $Evento->Modificar($idEvento, $Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin);
            return $Eve;
        }
        
        public function EliminarEvento($idEvento) {
            $Evento = new EventoModel();
            $Eve = $Evento->Eliminar($idEvento);
            return $Eve;
        }
        
    }

?>
<?php

    require_once('../model/calificacion.entidad.php');
    require_once('../model/calificacion.model.php');

    class CalificacionController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new CalificacionModel();
        }
        
        public function CrearCalificacion($Usuario_idUsuario, $Evento_idEvento, $calificacion) {
            $Calificacion = new CalificacionModel();
            $Cal = $Calificacion->Crear($Usuario_idUsuario, $Evento_idEvento, $calificacion);
            return $Cal;
        }
    
        public function ListarCalificacion() {
            $Calificacion = new CalificacionModel();
            $Cal = $Calificacion->Listar();
            return $Cal;
        }
    
        public function VerCalificacion($idCalificacion) {
            $Calificacion = new CalificacionModel();
            $Cal = $Calificacion->Ver($idCalificacion);
            return $Cal;
        }
    
        public function ModificarCalificacion($idCalificacion, $Usuario_idUsuario, $Evento_idEvento, $calificacion) { 
            $Calificacion = new CalificacionModel(); 
            $Cal = $Calificacion->Modificar($idCalificacion, $Usuario_idUsuario, $Evento_idEvento, $calificacion);
            return $Cal;
        }
        
        public function EliminarCalificacion($idCalificacion) {
            $Calificacion = new CalificacionModel();
            $Cal = $Calificacion->Eliminar($idCalificacion);
            return $Cal;
        }
        
    }

?>
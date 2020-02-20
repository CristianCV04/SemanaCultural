<?php

    require_once('../model/programacion.entidad.php');
    require_once('../model/programacion.model.php');

    class ProgramacionController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new ProgramacionModel();
        }
        
        public function CrearProgramacion($nombre) {
            $Programacion = new ProgramacionModel();
            $Prog = $Programacion->Crear($nombre);
            return $Prog;
        }
    
        public function ListarProgramacion() {
            $Programacion = new ProgramacionModel();
            $Prog = $Programacion->Listar();
            return $Prog;
        }
    
        public function VerProgramacion($idProgramacion) {
            $Programacion = new ProgramacionModel();
            $Prog = $Programacion->Ver($idProgramacion);
            return $Prog;
        }
    
        public function ModificarProgramacion($idProgramacion, $nombre) { 
            $Programacion = new ProgramacionModel(); 
            $Prog = $Programacion->Modificar($idProgramacion, $nombre);
            return $Prog;
        }
        
        public function EliminarProgramacion($idProgramacion) {
            $Programacion = new ProgramacionModel();
            $Prog = $Programacion->Eliminar($idProgramacion);
            return $Prog;
        }
        
    }

?>
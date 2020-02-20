<?php

    require_once('../model/pasopaso.entidad.php');
    require_once('../model/pasopaso.model.php');

    class PasoPasoController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new PasoPasoModel();
        }
        
        public function CrearPasoPaso($Evento_idEvento, $descripcion, $tiempo) {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->Crear($Evento_idEvento, $descripcion, $tiempo);
            return $Paso;
        }
    
        public function ListarPasoPaso() {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->Listar();
            return $Paso;
        }
    
        public function VerPasoPaso($idPasoPaso) {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->Ver($idPasoPaso);
            return $Paso;
        }
        
        public function VerPasoPasoByEvento($Evento_idEvento) {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->VerByEvento($Evento_idEvento);
            return $Paso;
        }
        
        public function VerPasoPasoByAll($Evento_idEvento, $descripcion,  $tiempo) {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->VerByAll($Evento_idEvento, $descripcion, $tiempo);
            return $Paso;
        }
    
        public function ModificarPasoPaso($idPasoPaso, $Evento_idEvento, $descripcion, $tiempo) { 
            $PasoPaso = new PasoPasoModel(); 
            $Paso = $PasoPaso->Modificar($idPasoPaso, $Evento_idEvento, $descripcion, $tiempo);
            return $Paso;
        }
        
        public function EliminarPasoPaso($idPasoPaso) {
            $PasoPaso = new PasoPasoModel();
            $Paso = $PasoPaso->Eliminar($idPasoPaso);
            return $Paso;
        }
        
    }

?>
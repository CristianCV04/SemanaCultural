<?php

    require_once('../model/restauracion.entidad.php');
    require_once('../model/restauracion.model.php');

    class RestauracionController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new RestauracionModel();
        }
        
        public function CrearRestauracion($Usuario_idUsuario, $email, $token) {
            $Restauracion = new RestauracionModel();
            $Rest = $Restauracion->Crear($Usuario_idUsuario, $email, $token);
            return $Rest;
        }
    
        public function ListarRestauracion() {
            $Restauracion = new RestauracionModel();
            $Rest = $Restauracion->Listar();
            return $Rest;
        }
    
        public function VerRestauracion($token) {
            $Restauracion = new RestauracionModel();
            $Rest = $Restauracion->Ver($token);
            return $Rest;
        }
    
        public function ModificarRestauracion($idRestauracion, $Usuario_idUsuario, $email, $token, $subida) { 
            $Restauracion = new RestauracionModel(); 
            $Rest = $Restauracion->Modificar($idRestauracion, $Usuario_idUsuario, $email, $token, $subida);
            return $Rest;
        }
        
        public function EliminarRestauracion($token) {
            $Restauracion = new RestauracionModel();
            $Rest = $Restauracion->Eliminar($token);
            return $Rest;
        }
        
    }

?>
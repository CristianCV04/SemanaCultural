<?php

    require_once('../model/visita.entidad.php');
    require_once('../model/visita.model.php');

    class VisitaController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new VisitaModel();
        }
        
        public function CrearVisita($Usuario_idUsuario) {
            $Visita = new VisitaModel();
            $Visi = $Visita->Crear($Usuario_idUsuario);
            return $Visi;
        }
    
        public function ListarVisita() {
            $Visita = new VisitaModel();
            $Visi = $Visita->Listar();
            return $Visi;
        }
    
        public function VerVisita($idVisita) {
            $Visita = new VisitaModel();
            $Visi = $Visita->Ver($idVisita);
            return $Visi;
        }
    
        public function ModificarVisita($idVisita, $Usuario_idUsuario, $ingreso) { 
            $Visita = new VisitaModel(); 
            $Visi = $Favorito->Modificar($idVisita, $Usuario_idUsuario, $ingreso);
            return $Visi;
        }
        
        public function EliminarVisita($idVisita) {
            $Visita = new VisitaModel();
            $Visi = $Visita->Eliminar($idVisita);
            return $Visi;
        }
        
    }

?> 
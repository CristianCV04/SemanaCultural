<?php

    require_once('../model/favorito.entidad.php');
    require_once('../model/favorito.model.php');

    class FavoritoController {
    
        private $model;
    
        public function __CONSTRUCT() {
            $this->model = new FavoritoModel();
        }
        
        public function CrearFavorito($Usuario_idUsuario, $Evento_idEvento) {
            $Favorito = new FavoritoModel();
            $Fav = $Favorito->Crear($Usuario_idUsuario, $Evento_idEvento);
            return $Fav;
        }
    
        public function ListarFavorito() {
            $Favorito = new FavoritoModel();
            $Fav = $Favorito->Listar();
            return $Fav;
        }
        
        public function ListarFavoritoByUsuario($Usuario_idUsuario) {
            $Favorito = new FavoritoModel();
            $Fav = $Favorito->ListarByUsuario($Usuario_idUsuario);
            return $Fav;
        }
        
        public function ListarFavoritoByEvento($Evento_idEvento) {
            $Favorito = new FavoritoModel();
            $Fav = $Favorito->ListarByEvento($Evento_idEvento);
            return $Fav;
        }
    
        public function VerFavorito($idFavorito) {
            $Favorito = new FavoritoModel();
            $Fav = $Favorito->Ver($idFavorito);
            return $Fav;
        }
    
        public function ModificarFavorito($idFavorito, $Usuario_idUsuario, $Evento_idEvento) { 
            $Favorito = new FavoritoModel(); 
            $Fav = $Favorito->Modificar($idFavorito, $Usuario_idUsuario, $Evento_idEvento);
            return $Fav;
        }
        
        public function EliminarFavorito($idFavorito) {
            $Favorito = new FavoritoModel();
            $Fav =  $Favorito->Eliminar($idFavorito);
            return $Fav;
        }
        
    }

?> 
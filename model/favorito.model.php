<?php
    
    require_once('conexion.php');

    class FavoritoModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Evento_idEvento) {
            try {
                $sql = ("INSERT INTO favorito (Usuario_idUsuario, Evento_idEvento) VALUES (?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento))) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Listar() {
            try {
                $Fav = array();
                $stm = $this->pdo->prepare("SELECT * FROM favorito");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Favorito = new Favorito();
                    $Favorito->__SET('idFavorito', $r->idFavorito);
                    $Favorito->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Favorito->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Fav[] = $Favorito;
                }
                return $Fav;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function ListarByUsuario($Usuario_idUsuario) {
            try {
                $Fav = array();
                $stm = $this->pdo->prepare("SELECT * FROM favorito");
                if($stm->execute(array($Usuario_idUsuario))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $Favorito = new Favorito();
                        $Favorito->__SET('idFavorito', $r->idFavorito);
                        $Favorito->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                        $Favorito->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $Fav[] = $Favorito;
                    }
                    return $Fav;
                } else {
                    return NULL;
                }
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function ListarByEvento($Evento_idEvento) {
            try {
                $Fav = array();
                $stm = $this->pdo->prepare("SELECT * FROM favorito WHERE Evento_idEvento = ?");
                $stm->execute(array($Evento_idEvento));
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Favorito = new Favorito();
                    $Favorito->__SET('idFavorito', $r->idFavorito);
                    $Favorito->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Favorito->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Fav[] = $Favorito;
                }
                return $Fav;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idFavorito) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM favorito WHERE idFavorito = ?");
                $stm->execute(array($idFavorito));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Favorito = new Favorito();
                    $Favorito->__SET('idFavorito', $r->idFavorito);
                    $Favorito->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Favorito->__SET('Evento_idEvento', $r->Evento_idEvento);
                    return $Favorito;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idFavorito, $Usuario_idUsuario, $Evento_idEvento) {
            try {
                $sql = ("UPDATE favorito SET  Usuario_idUsuario = ?, Evento_idEvento = ? WHERE idFavorito = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $idFavorito));
                $Favorito = new FavoritoModel();
                $Fav = $Favorito->Ver($idFavorito);
                return $Fav;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idFavorito) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM favorito WHERE idFavorito = ?");			          
                if($stm->execute(array($idFavorito))) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }

?>
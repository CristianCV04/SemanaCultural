<?php
    
    require_once('conexion.php');

    class EventoModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin) {
            try {
                $sql = ("INSERT INTO evento (Programacion_idProgramacion, Lugar_idLugar, nombre, descripcion, inicio, fin) VALUES (?, ?, ?, ?, ?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin))) {
                    $Evento = new EventoModel();
                    $Eve = $Evento->VerByNombre($nombre);
                    return $Eve;
                } else {
                    return NULL;
                }                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function ListarDistinc() {
            try {
                $Eve = array();
                $stm = $this->pdo->prepare("SELECT * FROM evento GROUP BY CAST(inicio AS DATE)");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    $Eve[] = $Evento;
                }
                return $Eve;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Listar($inicio) {
            try {
                $Eve = array();
                $stm = $this->pdo->prepare("SELECT * FROM evento WHERE CAST(inicio AS DATE) = ?");
                $stm->execute(array($inicio));
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    $Eve[] = $Evento;
                }
                return $Eve;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function ListarAll() {
            try {
                $Eve = array();
                $stm = $this->pdo->prepare("SELECT * FROM evento");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    $Eve[] = $Evento;
                }
                return $Eve;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function ListarPermanente() {
            try {
                $Eve = array();
                $stm = $this->pdo->prepare("SELECT * FROM evento WHERE inicio = NULL");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    $Eve[] = $Evento;
                }
                return $Eve;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Ver($idEvento) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM evento WHERE idEvento = ?");
                $stm->execute(array($idEvento));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    return $Evento;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByNombre($nombre) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM evento WHERE nombre = ?");
                $stm->execute(array($nombre));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Evento = new Evento();
                    $Evento->__SET('idEvento', $r->idEvento);
                    $Evento->__SET('Programacion_idProgramacion', $r->Programacion_idProgramacion);
                    $Evento->__SET('Lugar_idLugar', $r->Lugar_idLugar);
                    $Evento->__SET('nombre', $r->nombre);
                    $Evento->__SET('descripcion', $r->descripcion);
                    $Evento->__SET('inicio', $r->inicio);
                    $Evento->__SET('fin', $r->fin);
                    return $Evento;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idEvento, $Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin) {
            try {
                $sql = ("UPDATE evento SET Programacion_idProgramacion = ?, Lugar_idLugar = ?, nombre = ?, descripcion = ?, inicio = ?, fin = ? WHERE idEvento = ?");
                $this->pdo->prepare($sql)->execute(array($Programacion_idProgramacion, $Lugar_idLugar, $nombre, $descripcion, $inicio, $fin, $idEvento));
                $Evento = new EventoModel();
                $Eve = $Evento->Ver($idEvento);
                return $Eve;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idEvento) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM evento WHERE idEvento = ?");			          
                if($stm->execute(array($idEvento))) {
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
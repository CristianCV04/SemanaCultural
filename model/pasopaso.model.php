<?php
    
    require_once('conexion.php');

    class PasoPasoModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Evento_idEvento, $descripcion, $tiempo) {
            try {
                $sql = ("INSERT INTO pasopaso (Evento_idEvento, descripcion, tiempo) VALUES (?, ?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Evento_idEvento, $descripcion, $tiempo))) {
                    $PasoPaso = new PasoPasoModel();
                    $Paso = $PasoPaso->VerByAll($Evento_idEvento, $descripcion, $tiempo);
                    return $Paso;
                } else {
                    return NULL;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Listar() {
            try {
                $Paso = array();
                $stm = $this->pdo->prepare("SELECT * FROM pasopaso");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $PasoPaso = new PasoPaso();
                    $PasoPaso->__SET('idPasoPaso', $r->idPasoPaso);
                    $PasoPaso->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $PasoPaso->__SET('descripcion', $r->descripcion);
                    $PasoPaso->__SET('tiempo', $r->tiempo);
                    $Paso[] = $PasoPaso;
                }
                return $Paso;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByEvento($Evento_idEvento) {
            try {
                $Paso = array();
                $stm = $this->pdo->prepare("SELECT * FROM pasopaso WHERE Evento_idEvento = ?");
                if($stm->execute(array($Evento_idEvento))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $PasoPaso = new PasoPaso();
                        $PasoPaso->__SET('idPasoPaso', $r->idPasoPaso);
                        $PasoPaso->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $PasoPaso->__SET('descripcion', $r->descripcion);
                        $PasoPaso->__SET('tiempo', $r->tiempo);
                        $Paso[] = $PasoPaso;
                    }
                    return $Paso;    
                } else {
                    return NULL;    
                }
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idPasoPaso) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM pasopaso WHERE idPasoPaso = ?");
                $stm->execute(array($idPasoPaso));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $PasoPaso = new PasoPaso();
                    $PasoPaso->__SET('idPasoPaso', $r->idPasoPaso);
                    $PasoPaso->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $PasoPaso->__SET('descripcion', $r->descripcion);
                    $PasoPaso->__SET('tiempo', $r->tiempo);
                    return $PasoPaso;
                } else {
                    return NULL;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByAll($Evento_idEvento, $descripcion, $tiempo) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM pasopaso WHERE Evento_idEvento = ? AND descripcion = ? AND tiempo = ?");
                $stm->execute(array($Evento_idEvento, $descripcion, $tiempo));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $PasoPaso = new PasoPaso();
                    $PasoPaso->__SET('idPasoPaso', $r->idPasoPaso);
                    $PasoPaso->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $PasoPaso->__SET('descripcion', $r->descripcion);
                    $PasoPaso->__SET('tiempo', $r->tiempo);
                    return $PasoPaso;
                } else {
                    return NULL;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idPasoPaso, $Evento_idEvento, $descripcion, $tiempo) {
            try {
                $sql = ("UPDATE pasopaso SET  Evento_idEvento = ?, descripcion = ?, tiempo = ? WHERE idPasoPaso = ?");
                $this->pdo->prepare($sql)->execute(array($Evento_idEvento, $descripcion, $tiempo, $idPasoPaso));
                $PasoPaso = new PasoPasoModel();
                $Paso = $PasoPaso->Ver($idPasoPaso);
                return $Paso;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idPasoPaso) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM pasopaso WHERE idPasoPaso = ?");			          
                if($stm->execute(array($idPasoPaso))) {
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
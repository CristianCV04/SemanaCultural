<?php
    
    require_once('conexion.php');

    class LugarModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($nombre) {
            try {
                $sql = ("INSERT INTO lugar (nombre) VALUES (?)");
                if($this->pdo->prepare($sql)->execute(array($nombre))) {
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
                $Lug = array();
                $stm = $this->pdo->prepare("SELECT * FROM lugar");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Lugar = new Lugar();
                    $Lugar->__SET('idLugar', $r->idLugar);
                    $Lugar->__SET('nombre', $r->nombre);
                    $Lug[] = $Lugar;
                }
                return $Lug;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Listar1($idLugar) {
            try {
                $Lug = array();
                $stm = $this->pdo->prepare("SELECT * FROM lugar WHERE idLugar != ?");
                $stm->execute(array($idLugar));
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Lugar = new Lugar();
                    $Lugar->__SET('idLugar', $r->idLugar);
                    $Lugar->__SET('nombre', $r->nombre);
                    $Lug[] = $Lugar;
                }
                return $Lug;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idLugar) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM lugar WHERE idLugar = ?");
                $stm->execute(array($idLugar));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Lugar = new Lugar();
                    $Lugar->__SET('idLugar', $r->idLugar);
                    $Lugar->__SET('nombre', $r->nombre);
                    return $Lugar;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idLugar, $nombre) {
            try {
                $sql = ("UPDATE lugar SET  nombre = ? WHERE idLugar = ?");
                $this->pdo->prepare($sql)->execute(array($nombre, $idLugar));
                $Lugar = new LugarModel();
                $Lug = $Lugar->Ver($idLugar);
                return $Lug;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idLugar) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM lugar WHERE idLugar = ?");			          
                if($stm->execute(array($idLugar))) {
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
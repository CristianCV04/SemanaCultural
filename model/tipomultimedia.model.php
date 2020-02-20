<?php
    
    require_once('conexion.php');

    class TipoMultimediaModel {
	
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
                $sql = ("INSERT INTO tipomultimedia (nombre) VALUES (?)");
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
                $TipoMulti = array();
                $stm = $this->pdo->prepare("SELECT * FROM tipomultimedia");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $TipoMultimedia = new TipoMultimedia();
                    $TipoMultimedia->__SET('idTipoMultimedia', $r->idTipoMultimedia);
                    $TipoMultimedia->__SET('nombre', $r->nombre);
                    $TipoMulti[] = $TipoMultimedia;
                }
                return $TipoMulti;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idTipoMultimedia) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM tipomultimedia WHERE idTipoMultimedia = ?");
                $stm->execute(array($idTipoMultimedia));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $TipoMultimedia = new TipoMultimedia();
                    $TipoMultimedia->__SET('idTipoMultimedia', $r->idTipoMultimedia);
                    $TipoMultimedia->__SET('nombre', $r->nombre);
                    return $TipoMultimedia;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idTipoMultimedia, $nombre) {
            try {
                $sql = ("UPDATE tipomultimedia SET  nombre = ? WHERE idTipoMultimedia = ?");
                $this->pdo->prepare($sql)->execute(array($nombre, $idTipoMultimedia));
                $TipoMultimedia = new TipoMultimediaModel();
                $TipoMulti = $TipoMultimedia->Ver($idTipoMultimedia);
                return $TipoMulti;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idTipoMultimedia) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM tipomultimedia WHERE idTipoMultimedia = ?");			          
                if($stm->execute(array($idTipoMultimedia))) {
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
<?php
    
    require_once('conexion.php');

    class ProgramacionModel {
	
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
                $sql = ("INSERT INTO programacion (nombre) VALUES (?)");
                if($this->pdo->prepare($sql)->execute(array($nombre))) {
                    retrurn TRUE;
                } else {
                    return FALSE;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Listar() {
            try {
                $Prog = array();
                $stm = $this->pdo->prepare("SELECT * FROM programacion");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Programacion = new Programacion();
                    $Programacion->__SET('idProgramacion', $r->idProgramacion);
                    $Programacion->__SET('nombre', $r->nombre);
                    $Prog[] = $Programacion;
                }
                return $Prog;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idProgramacion) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM programacion WHERE idProgramacion = ?");
                $stm->execute(array($idProgramacion));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Programacion = new Programacion();
                    $Programacion->__SET('idProgramacion', $r->idProgramacion);
                    $Programacion->__SET('nombre', $r->nombre);
                    return $Programacion;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idProgramacion, $nombre) {
            try {
                $sql = ("UPDATE programacion SET  nombre = ? WHERE idProgramacion = ?");
                $this->pdo->prepare($sql)->execute(array($nombre, $idProgramacion));
                $Programacion = new ProgramacionModel();
                $Prog = $Programacion->Ver($idProgramacion);
                return $Prog;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idProgramacion) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM programacion WHERE idProgramacion = ?");			          
                if($stm->execute(array($idProgramacion))) {
                    return TRUE;   
                } esle {
                    return FALSE;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }

?>
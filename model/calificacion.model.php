<?php
    
    require_once('conexion.php');

    class CalificacionModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Evento_idEvento, $calificacion) {
            try {
                $sql = ("INSERT INTO calificacion (Usuario_idUsuario, Evento_idEvento, calificacion) VALUES (?, ?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $calificacion))) {
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
                $Cal = array();
                $stm = $this->pdo->prepare("SELECT * FROM calificacion");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Calificacion = new Calificacion();
                    $Calificacion->__SET('idCalificacion', $r->idCalificacion);
                    $Calificacion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Calificacion->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Calificacion->__SET('calificacion', $r->calificacion);
                    $Cal[] = $Calificacion;
                }
                return $Cal;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idCalificacion) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM calificacion WHERE idCalificacion = ?");
                $stm->execute(array($idCalificacion));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Calificacion = new Calificacion();
                    $Calificacion->__SET('idCalificacion', $r->idCalificacion);
                    $Calificacion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Calificacion->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Calificacion->__SET('calificacion', $r->calificacion);
                    return $Calificacion;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idCalificacion, $Usuario_idUsuario, $Evento_idEvento, $calificacion) {
            try {
                $sql = ("UPDATE calificacion SET Usuario_idUsuario = ?, Evento_idEvento = ?, calificacion = ? WHERE idCalificacion = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $calificacion, $idCalificacion));
                $Calificacion = new CalificacionModel();
                $Cal = $Calificacion->Ver($idCalificacion);
                return $Cal;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idCalificacion) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM calificacion WHERE idCalificacion = ?");			          
                if($stm->execute(array($idCalificacion))){
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
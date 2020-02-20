<?php
    
    require_once('conexion.php');

    class VisitaModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario) {
            try {
                $sql = ("INSERT INTO visita (Usuario_idUsuario, ingreso) VALUES (?, NOW())");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario))) {
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
                $Visi = array();
                $stm = $this->pdo->prepare("SELECT * FROM visita");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Visita = new Visita();
                    $Visita->__SET('idVisita', $r->idVisita);
                    $Visita->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Visita->__SET('ingreso', $r->ingreso);
                    $Visi[] = $Visita;
                }
                return $Visi;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idVisita) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM visita WHERE idVisita = ?");
                $stm->execute(array($idVisita));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Visita = new Visita();
                    $Visita->__SET('idVisita', $r->idVisita);
                    $Visita->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Visita->__SET('ingreso', $r->ingreso);
                    return $Visita;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idVisita, $Usuario_idUsuario, $ingreso) {
            try {
                $sql = ("UPDATE visita SET  Usuario_idUsuario = ?, ingreso = ? WHERE idVisita = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $ingreso, $idVisita));
                $Visita = new VisitaModel();
                $Visi = $Visita->Ver($idVisita);
                return $Visi;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idVisita) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM visita WHERE idVisita = ?");			          
                if($stm->execute(array($idVisita))) {
                    return TRUE;
                } else{
                    return FALSE;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
    }

?>
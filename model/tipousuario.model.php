<?php
    
    require_once('conexion.php');

    class TipoUsuarioModel {
	
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
                $sql = ("INSERT INTO tipousuario (nombre) VALUES (?)");
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
                $TipoUsu = array();
                $stm = $this->pdo->prepare("SELECT * FROM tipousuario");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $TipoUsuario = new TipoUsuario();
                    $TipoUsuario->__SET('idTipoUsuario', $r->idTipoUsuario);
                    $TipoUsuario->__SET('nombre', $r->nombre);
                    $TipoUsu[] = $TipoUsuario;
                }
                return $TipoUsu;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Listar1($idTipoUsuario) {
            try {
                $TipoUsu = array();
                $stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE idTipoUsuario != ?");
                $stm->execute(array($idTipoUsuario));
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $TipoUsuario = new TipoUsuario();
                    $TipoUsuario->__SET('idTipoUsuario', $r->idTipoUsuario);
                    $TipoUsuario->__SET('nombre', $r->nombre);
                    $TipoUsu[] = $TipoUsuario;
                }
                return $TipoUsu;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idTipoUsuario) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM tipousuario WHERE idTipoUsuario = ?");
                $stm->execute(array($idTipoUsuario));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $TipoUsuario = new TipoUsuario();
                    $TipoUsuario->__SET('idTipoUsuario', $r->idTipoUsuario);
                    $TipoUsuario->__SET('nombre', $r->nombre);
                    return $TipoUsuario;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idTipoUsuario, $nombre) {
            try {
                $sql = ("UPDATE tipousuario SET  nombre = ? WHERE idTipoUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($nombre, $idTipoUsuario));
                $TipoUsuario = new TipoUsuarioModel();
                $TipoUsu = $TipoUsuario->Ver($idTipoUsuario);
                return $TipoUsu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idTipoUsuario) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM tipousuario WHERE idTipoUsuario = ?");			          
                if($stm->execute(array($idTipoUsuario))) {
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
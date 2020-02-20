<?php
    
    require_once('conexion.php');

    class ChatModel {
	
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
                $sql = ("INSERT INTO chat (nombre) VALUES (?)");
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
                $Ch = array();
                $stm = $this->pdo->prepare("SELECT * FROM chat");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Chat = new Chat();
                    $Chat->__SET('idChat', $r->idChat);
                    $Chat->__SET('nombre', $r->nombre);
                    $Ch[] = $Chat;
                }
                return $Ch;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idChat) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM chat WHERE idChat = ?");
                $stm->execute(array($idChat));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Chat = new Chat();
                    $Chat->__SET('idChat', $r->idChat);
                    $Chat->__SET('nombre', $r->nombre);
                    return $Chat;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idChat, $nombre) {
            try {
                $sql = ("UPDATE lugar SET nombre = ? WHERE idChat = ?");
                $this->pdo->prepare($sql)->execute(array($nombre, $idChat));
                $Chat = new ChatModel();
                $Ch = $Chat->Ver($idChat);
                return $Ch;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idChat) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM chat WHERE idChat = ?");			          
                if($stm->execute(array($idChat))) {
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
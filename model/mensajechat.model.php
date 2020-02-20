<?php
    
    require_once('conexion.php');

    class MensajeChatModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Chat_idChat, $mensaje) {
            try {
                $sql = ("INSERT INTO mensajechat (Usuario_idUsuario, Chat_idChat, mensaje, subida) VALUES (?, ?, ?, NOW())");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Chat_idChat, $mensaje))) {
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
                $MsjChat = array();
                $stm = $this->pdo->prepare("SELECT * FROM mensajechat");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $MensajeChat = new MensajeChat();
                    $MensajeChat->__SET('idMensajeChat', $r->idMensajeChat);
                    $MensajeChat->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $MensajeChat->__SET('Chat_idChat', $r->Chat_idChat);
                    $MensajeChat->__SET('mensaje', $r->mensaje);
                    $MensajeChat->__SET('subida', $r->subida);
                    $MsjChat[] = $MensajeChat;
                }
                return $MsjChat;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idMensajeChat) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM mensajechat WHERE idMensajeChat = ?");
                $stm->execute(array($idMensajeChat));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $MensajeChat = new MensajeChat();
                    $MensajeChat->__SET('idMensajeChat', $r->idMensajeChat);
                    $MensajeChat->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $MensajeChat->__SET('Chat_idChat', $r->Chat_idChat);
                    $MensajeChat->__SET('mensaje', $r->mensaje);
                    $MensajeChat->__SET('subida', $r->subida);
                    return $MensajeChat;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idMensajeChat, $Usuario_idUsuario, $Chat_idChat, $mensaje, $subida) {
            try {
                $sql = ("UPDATE mensajechat SET  Usuario_idUsuario = ?, Chat_idChat = ?, mensaje = ?, subida = ? WHERE idMensajeChat = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Chat_idChat, $mensaje, $subida, $idMensajeChat));
                $MensajeChat = new MensajeChatModel();
                $MsjChat = $MensajeChat->Ver($idMensajeChat);
                return $MsjChat;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idMensajeChat) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM mensajechat WHERE idMensajeChat = ?");			          
                if($stm->execute(array($idMensajeChat))) {
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
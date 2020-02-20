<?php
    
    require_once('conexion.php');

    class ComentarioModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Evento_idEvento, $comentario) {
            try {
                $sql = ("INSERT INTO comentario (Usuario_idUsuario, Evento_idEvento, comentario, subida) VALUES (?, ?, ?, NOW())");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $comentario))) {
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
                $Com = array();
                $stm = $this->pdo->prepare("SELECT * FROM comentario");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Comentario = new Comentario();
                    $Comentario->__SET('idComentario', $r->idComentario);
                    $Comentario->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Comentario->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Comentario->__SET('Comentario_idComentario', $r->Comentario_idComentario);
                    $Comentario->__SET('comentario', $r->comentario);
                    $Comentario->__SET('subida', $r->subida);
                    $Com[] = $Comentario;
                }
                return $Com;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByEvento($Evento_idEvento) {
            try {
                $Com = array();
                $stm = $this->pdo->prepare("SELECT * FROM comentario WHERE Evento_idEvento = ?");
                if($stm->execute(array($Evento_idEvento))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $Comentario = new Comentario();
                        $Comentario->__SET('idComentario', $r->idComentario);
                        $Comentario->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                        $Comentario->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $Comentario->__SET('Comentario_idComentario', $r->Comentario_idComentario);
                        $Comentario->__SET('comentario', $r->comentario);
                        $Comentario->__SET('subida', $r->subida);
                        $Com[] = $Comentario;
                    }
                    return $Com;
                } else {
                    return NULL;
                }
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idComentario) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM comentario WHERE idComentario = ?");
                $stm->execute(array($idComentario));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Comentario = new Comentario();
                    $Comentario->__SET('idComentario', $r->idComentario);
                    $Comentario->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Comentario->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Comentario->__SET('Comentario_idComentario', $r->Comentario_idComentario);
                    $Comentario->__SET('comentario', $r->comentario);
                    $Comentario->__SET('subida', $r->subida);
                    return $Comentario;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idComentario, $Usuario_idUsuario, $Evento_idEvento, $Comentario_idComentario, $comentario, $subida) {
            try {
                $sql = ("UPDATE comentario SET Usuario_idUsuario = ?, Evento_idEvento = ?, Comentario_idComentario = ?, comentario = ?, subida = ? WHERE idComentario = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $Comentario_idComentario, $comentario, $subida, $idComentario));
                $Comentario = new ComentarioModel();
                $Com = $Comentario->Ver($idComentario);
                return $Com;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idComentario) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM comentario WHERE idComentario = ?");			          
                if($stm->execute(array($idComentario))) {
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
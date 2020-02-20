<?php
    
    require_once('conexion.php');

    class NotificacionModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso) {
            try {
                $sql = ("INSERT INTO notificacion (Usuario_idUsuario, Evento_idEvento, PasoPaso_idPasoPaso, vista, subida) VALUES (?, ?, ?, FALSE, NOW())");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso))) {
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
                $Noti = array();
                $stm = $this->pdo->prepare("SELECT * FROM notificacion");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Notificacion = new Notificacion();
                    $Notificacion->__SET('idNotificacion', $r->idNotificacion);
                    $Notificacion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Notificacion->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Notificacion->__SET('PasoPaso_idPasoPaso', $r->PasoPaso_idPasoPaso);
                    $Notificacion->__SET('vista', $r->vista);
                    $Notificacion->__SET('subida', $r->subida);
                    $Noti[] = $Notificacion;
                }
                return $Noti;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Contar($Usuario_idUsuario) {
            try {
                $Noti = array();
                $stm = $this->pdo->prepare("SELECT * FROM notificacion WHERE Usuario_idUsuario = ? AND vista = FALSE");
                $stm->execute(array($Usuario_idUsuario));
                $i = 0;
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $i++;
                }
                return $i;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByUsuario($Usuario_idUsuario) {
            try {
                $Noti = array();
                $stm = $this->pdo->prepare("SELECT * FROM notificacion WHERE Usuario_idUsuario = ? AND vista = FALSE");
                if($stm->execute(array($Usuario_idUsuario))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $Notificacion = new Notificacion();
                        $Notificacion->__SET('idNotificacion', $r->idNotificacion);
                        $Notificacion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                        $Notificacion->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $Notificacion->__SET('PasoPaso_idPasoPaso', $r->PasoPaso_idPasoPaso);
                        $Notificacion->__SET('vista', $r->vista);
                        $Notificacion->__SET('subida', $r->subida);
                        $Noti[] = $Notificacion;
                    }
                    return $Noti;    
                } else {
                    return NULL;    
                }
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($idNotificacion) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM notificacion WHERE idNotificacion = ?");
                $stm->execute(array($idNotificacion));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Notificacion = new Notificacion();
                    $Notificacion->__SET('idNotificacion', $r->idNotificacion);
                    $Notificacion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Notificacion->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Notificacion->__SET('PasoPaso_idPasoPaso', $r->PasoPaso_idPasoPaso);
                    $Notificacion->__SET('vista', $r->vista);
                    $Notificacion->__SET('subida', $r->subida);
                    return $Notificacion;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idNotificacion, $Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso) {
            try {
                $sql = ("UPDATE notificacion SET Usuario_idUsuario = ?, Evento_idEvento = ?, PasoPaso_idPasoPaso = ? WHERE idNotificacion = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $PasoPaso_idPasoPaso, $idNotificacion));
                $Notificacion = new NotificacionModel();
                $Noti = $Notificacion->Ver($idNotificacion);
                return $Noti;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Vista($idNotificacion) {
            try {
                $sql = ("UPDATE notificacion SET vista = TRUE WHERE idNotificacion = ?");
                $this->pdo->prepare($sql)->execute(array($idNotificacion));
                $Notificacion = new NotificacionModel();
                $Noti = $Notificacion->Ver($idNotificacion);
                return $Noti;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idNotificacion) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM notificacion WHERE idNotificacion = ?");			          
                if($stm->execute(array($idNotificacion))) {
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
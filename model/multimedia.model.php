<?php
    
    require_once('conexion.php');

    class MultimediaModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida) {
            try {
                $sql = ("INSERT INTO multimedia (Usuario_idUsuario, Evento_idEvento, TipoMultimedia_idTipoMultimedia, nombre, descripcion, subida) VALUES (?, ?, ?, ?, ?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $nombre, $descripcion, $subida))) {
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
                $Multi = array();
                $stm = $this->pdo->prepare("SELECT * FROM multimedia");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Multimedia = new Multimedia();
                    $Multimedia->__SET('idMultimedia', $r->idMultimedia);
                    $Multimedia->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Multimedia->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Multimedia->__SET('TipoMultimedia_idTipoMultimedia', $r->TipoMultimedia_idTipoMultimedia);
                    $Multimedia->__SET('descripcion', $r->descripcion);
                    $Multimedia->__SET('subida', $r->subida);
                    $Multi[] = $Multimedia;
                }
                return $Multi;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerImagen($Evento_idEvento) {
            try {
                $Multi = array();
                $stm = $this->pdo->prepare("SELECT * FROM multimedia WHERE Evento_idEvento = ? AND TipoMultimedia_idTipoMultimedia = 1");
                if($stm->execute(array($Evento_idEvento))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $Multimedia = new Multimedia();
                        $Multimedia->__SET('idMultimedia', $r->idMultimedia);
                        $Multimedia->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                        $Multimedia->__SET('nombre', $r->nombre);
                        $Multimedia->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $Multimedia->__SET('TipoMultimedia_idTipoMultimedia', $r->TipoMultimedia_idTipoMultimedia);
                        $Multimedia->__SET('descripcion', $r->descripcion);
                        $Multimedia->__SET('subida', $r->subida);
                        $Multi[] = $Multimedia;
                    }
                } else {
                    return NULL;
                }
                return $Multi;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function VerVideo($Evento_idEvento) {
            try {
                $Multi = array();
                $stm = $this->pdo->prepare("SELECT * FROM multimedia WHERE Evento_idEvento = ? AND TipoMultimedia_idTipoMultimedia = 2");
                if($stm->execute(array($Evento_idEvento))) {
                    foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                        $Multimedia = new Multimedia();
                        $Multimedia->__SET('idMultimedia', $r->idMultimedia);
                        $Multimedia->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                        $Multimedia->__SET('nombre', $r->nombre);
                        $Multimedia->__SET('Evento_idEvento', $r->Evento_idEvento);
                        $Multimedia->__SET('TipoMultimedia_idTipoMultimedia', $r->TipoMultimedia_idTipoMultimedia);
                        $Multimedia->__SET('descripcion', $r->descripcion);
                        $Multimedia->__SET('subida', $r->subida);
                        $Multi[] = $Multimedia;
                    }
                } else {
                    return NULL;
                }
                return $Multi;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Ver($idMultimedia) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM multimedia WHERE idMultimedia = ?");
                $stm->execute(array($idMultimedia));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Multimedia = new Multimedia();
                    $Multimedia->__SET('idMultimedia', $r->idMultimedia);
                    $Multimedia->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Multimedia->__SET('Evento_idEvento', $r->Evento_idEvento);
                    $Multimedia->__SET('TipoMultimedia_idTipoMultimedia', $r->TipoMultimedia_idTipoMultimedia);
                    $Multimedia->__SET('descripcion', $r->descripcion);
                    $Multimedia->__SET('subida', $r->subida);
                    return $Multimedia;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idMultimedia, $Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $descripcion, $subida) {
            try {
                $sql = ("UPDATE multimedia SET  Usuario_idUsuario = ?, Evento_idEvento = ?, TipoMultimedia_idTipoMultimedia = ?, descripcion = ?, subida = ? WHERE idMultimedia = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $Evento_idEvento, $TipoMultimedia_idTipoMultimedia, $descripcion, $subida, $idMultimedia));
                $Multimedia = new MultimediaModel();
                $Multi = $Multimedia->Ver($idMultimedia);
                return $Multi;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($idMultimedia) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM multimedia WHERE idMultimedia = ?");			          
                if($stm->execute(array($idMultimedia))) {
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
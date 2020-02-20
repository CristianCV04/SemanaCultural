<?php
    
    require_once('conexion.php');

    class RestauracionModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($Usuario_idUsuario, $email, $token) {
            try {
                $sql = ("INSERT INTO restauracion (Usuario_idUsuario, email, token) VALUES (?, ?, ?)");
                if($this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $email, $token))) {
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
                $Rest = array();
                $stm = $this->pdo->prepare("SELECT * FROM restauracion");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Restauracion = new Restauracion();
                    $Restauracion->__SET('idRestauracion', $r->idRestauracion);
                    $Restauracion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Restauracion->__SET('email', $r->email);
                    $Restauracion->__SET('token', $r->token);
                    $Restauracion->__SET('subida', $r->subida);
                    $Rest[] = $Restauracion;
                }
                return $Rest;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Ver($token) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM restauracion WHERE token = ?");
                $stm->execute(array($token));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Restauracion = new Restauracion();
                    $Restauracion->__SET('idRestauracion', $r->idRestauracion);
                    $Restauracion->__SET('Usuario_idUsuario', $r->Usuario_idUsuario);
                    $Restauracion->__SET('email', $r->email);
                    $Restauracion->__SET('token', $r->token);
                    $Restauracion->__SET('subida', $r->subida);
                    return $Restauracion;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idRestauracion, $Usuario_idUsuario, $email, $token, $subida) {
            try {
                $sql = ("UPDATE restauracion SET Usuario_idUsuario = ?, email = ?, token = ?, subida = ? WHERE idRestauracion = ?");
                $this->pdo->prepare($sql)->execute(array($Usuario_idUsuario, $email, $token, $subida, $idRestauracion));
                $Restauracion = new RestauracionModel();
                $Rest = $Restauracion->Ver($idRestauracion);
                return $Rest;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
                
        public function Eliminar($token) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM restauracion WHERE token = ?");			          
                if($stm->execute(array($token))) {
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
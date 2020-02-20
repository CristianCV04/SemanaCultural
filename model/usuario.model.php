<?php
    
    require_once('conexion.php');

    class UsuarioModel {
	
        private $pdo;

        public function __CONSTRUCT() {
            try {
                $this->pdo = Conexion::Conectar();     
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    
        public function Crear($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $password, $email) {
            try {
                $sql = ("INSERT INTO usuario (TipoUsuario_idTipoUsuario, nombres, apellido1, apellido2, username, password, email, confirmado) VALUES (?, ?, ?, ?, ?, ?, ?, FALSE)");
                $this->pdo->prepare($sql)->execute(array($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $password, $email));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->VerByUsername($username);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Listar($idUsuario) {
            try {
                $Usu = array();
                $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE idUsuario != ?");
                $stm->execute(array($idUsuario));
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Usuario = new Usuario();
                    $Usuario->__SET('idUsuario', $r->idUsuario);
                    $Usuario->__SET('TipoUsuario_idTipoUsuario', $r->TipoUsuario_idTipoUsuario);
                    $Usuario->__SET('nombres', $r->nombres);
                    $Usuario->__SET('apellido1', $r->apellido1);
                    $Usuario->__SET('apellido2', $r->apellido2);
                    $Usuario->__SET('username', $r->username);
                    $Usuario->__SET('password', $r->password);
                    $Usuario->__SET('email', $r->email);
                    $Usuario->__SET('bloqueado', $r->bloqueado);
                    $Usu[] = $Usuario;
                }
                return $Usu;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function Contar() {
            try {
                $Usuario = 0;
                $stm = $this->pdo->prepare("SELECT * FROM usuario");
                $stm->execute(array());
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                    $Usuario++;
                }
                return $Usuario;
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Ver($idUsuario) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
                $stm->execute(array($idUsuario));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Usuario = new Usuario();
                    $Usuario->__SET('idUsuario', $r->idUsuario);
                    $Usuario->__SET('TipoUsuario_idTipoUsuario', $r->TipoUsuario_idTipoUsuario);
                    $Usuario->__SET('nombres', $r->nombres);
                    $Usuario->__SET('apellido1', $r->apellido1);
                    $Usuario->__SET('apellido2', $r->apellido2);
                    $Usuario->__SET('username', $r->username);
                    $Usuario->__SET('password', $r->password);
                    $Usuario->__SET('email', $r->email);
                    $Usuario->__SET('bloqueado', $r->bloqueado);
                    $Usuario->__SET('confirmado', $r->confirmado);
                    return $Usuario;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function VerByUsername($username) {
            try {
                $stm = $this->pdo->prepare("SELECT * FROM usuario WHERE username = ?");
                $stm->execute(array($username));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                if($r) {
                    $Usuario = new Usuario();
                    $Usuario->__SET('idUsuario', $r->idUsuario);
                    $Usuario->__SET('TipoUsuario_idTipoUsuario', $r->TipoUsuario_idTipoUsuario);
                    $Usuario->__SET('nombres', $r->nombres);
                    $Usuario->__SET('apellido1', $r->apellido1);
                    $Usuario->__SET('apellido2', $r->apellido2);
                    $Usuario->__SET('username', $r->username);
                    $Usuario->__SET('password', $r->password);
                    $Usuario->__SET('email', $r->email);
                    $Usuario->__SET('bloqueado', $r->bloqueado);
                    $Usuario->__SET('confirmado', $r->confirmado);
                    return $Usuario;
                }
                return NULL;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function Modificar($idUsuario, $TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $email) {
            try {
                $sql = ("UPDATE usuario SET TipoUsuario_idTipoUsuario = ?, nombres = ?, apellido1 = ?, apellido2 = ?, username = ?, email = ? WHERE idUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($TipoUsuario_idTipoUsuario, $nombres, $apellido1, $apellido2, $username, $email, $idUsuario));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->Ver($idUsuario);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function ModificarPerfil($idUsuario, $nombres, $apellido1, $apellido2, $username) {
            try {
                $sql = ("UPDATE usuario SET nombres = ?, apellido1 = ?, apellido2 = ?, username = ? WHERE idUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($nombres, $apellido1, $apellido2, $username, $idUsuario));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->Ver($idUsuario);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function CambiarPassword($idUsuario, $password) {
            try {
                $sql = ("UPDATE usuario SET password = ? WHERE idUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($password, $idUsuario));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->Ver($idUsuario);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Bloquear($idUsuario, $bloqueado) {
            try {
                $sql = ("UPDATE usuario SET bloqueado = ? WHERE idUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($bloqueado, $idUsuario));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->Ver($idUsuario);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Confirmar($idUsuario) {
            try {
                $sql = ("UPDATE usuario SET confirmado = TRUE WHERE idUsuario = ?");
                $this->pdo->prepare($sql)->execute(array($idUsuario));
                $Usuario = new UsuarioModel();
                $Usu = $Usuario->Ver($idUsuario);
                return $Usu;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        
        public function Eliminar($idUsuario) {
            try {
                $stm = $this->pdo->prepare("DELETE FROM usuario WHERE idUsuario = ?");			          
                if ($stm->execute(array($idUsuario))) {
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
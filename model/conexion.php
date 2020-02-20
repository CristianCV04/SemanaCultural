<?php

    class Conexion {
        
        public static function Conectar() {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=semanacultural;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            return $pdo;
        }
        
    }

?>
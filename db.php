<?php
    function conection(){
        $conexion = null;
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $bd = 'encuesta';
        
        try {
            $conexion = new PDO("mysql:host=".$server.";dbname=".$bd, $user, $password);
            return $conexion;
        }catch (PDOException $e){
            echo "sin conexion: " . $e -> getMessage();
            return null;
        }

    }
?>
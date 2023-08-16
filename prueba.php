<?php
    class conexion{
        private $user ="root";
        private $pass ="";
        private $host ="localhost";
        private $bd ="encuesta";

        function conectar(){
            try {
                $conect = new PDO('mysql:host=localhost;dbname=encuesta', $this->user, $this->pass);
                echo 'Conexión correcta';
            } catch (\Throwable $e) {
                echo 'Sin conexión: '. $e->getMessage();
            }
        }
    }

    $newConexion = new conexion();
    $newConexion -> conectar();

?>
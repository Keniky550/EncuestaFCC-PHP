<?php
    class KEN{
        private $conexion;
        function conection(){
           
            $server = 'localhost';
            $user = 'root';
            $password = '';
            $bd = 'encuesta';
            
            try {
                $this->conexion = new PDO("mysql:host=".$server.";dbname=".$bd, $user, $password);
                return $this->conexion;
            }catch (PDOException $e){
                echo "sin conexion: " . $e -> getMessage();
                return null;
            }
    
        }
    
        function consultar($sql,$valores = array()) {
            if($sql !='' && strlen($sql)>0){
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute();
                $resultados=$consulta->fetchAll(PDO::FETCH_ASSOC);
                return $resultados;
            }else{
               // echo "sin conexion: " . $sql;
                return 0;
            }
        }
    }
?>
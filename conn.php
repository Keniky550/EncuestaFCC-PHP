<?php
    class KEN{
        private $conexion;

        public function __construct(){
            $server = 'localhost';
            $user = 'root';
            $password = '';
            $bd = 'encuesta';
            try {
                $this->conexion = new PDO("mysql:host=".$server.";dbname=".$bd, $user, $password);
            }catch (PDOException $e){
                $this->conexion = null;
            }
        }

        public function conection() :PDO | null {
            return $this->conexion;
        }
    
        function consultar($sql, array $params) {
            if($sql !='' && strlen($sql)>0){
                if($this->conexion){
                    $consulta = $this->conexion->prepare($sql);

                    foreach($params as $key => $value){
                        $consulta->bindParam($key, $value);
                    }

                    $consulta->execute();
                    $resultados=$consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $resultados;
                }else{
                    echo json_encode([
                        'message' => 'Unknown'
                    ]);
                    exit();
                }
            }else{
                echo "sin conexion: " . $sql;
                return 0;
            }
        }
    }
?>
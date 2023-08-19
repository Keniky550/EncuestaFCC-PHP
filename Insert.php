<?php
    require_once("conn.php");
    

    function insertSchool(){
        $kenneth = new KEN();
        $archivo = fopen("./datos/SCHOOL.csv", "r");
        $conexion = $kenneth->conection();
        try {
            $conexion -> beginTransaction();
            while(($datos  = fgetcsv($archivo, 0, ","))== true){
                $conexion -> exec("INSERT INTO school VALUES ('','$datos[0]')"); 
            }
            $conexion -> commit();
        } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
        }
        
        fclose($archivo);
    }

    function insertDocType(){
        $kenneth = new KEN();
        $archivo = fopen("./datos/DOC_TYPE.csv", "r");
        $conexion = $kenneth->conection();
        try {
            $conexion -> beginTransaction();
            while(($datos  = fgetcsv($archivo, 0, ","))== true){
                $conexion -> exec("INSERT INTO doc_student VALUES ('','$datos[0]')"); 
            }
            $conexion -> commit();
        } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
        }
        
        fclose($archivo);
    }

    function insertStudent(){
        $kenneth = new KEN();
        $archivo = fopen("./datos/STUDENT.csv", "r");
        $conexion = $kenneth->conection();
        try {
            $conexion -> beginTransaction();
            while(($datos  = fgetcsv($archivo, 0, ","))== true){
                $conexion -> exec("INSERT INTO student VALUES ('','$datos[0],'$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')"); 
            }
            $conexion -> commit();
        } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
        }
        
        fclose($archivo);
    }
 
    function insertTemporal(){
        $kenneth = new KEN();
        $archivo = fopen("./datos/TEMPORAL.csv", "r");
        $conexion = $kenneth->conection();
        $sql = 'SELECT id_sudent FROM student';
        //$result = $conexion->query($sql);
        try {
            $conexion -> beginTransaction();
            $dat = $kenneth -> consultar($sql);  
            foreach ($dat as $val){
                $id=$val['id_sudent'];
                while(($datos  = fgetcsv($archivo, 0, ","))== true){
                    $conexion -> exec("INSERT INTO temporal VALUES ('','$id','$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')"); 
                }
            }
            $conexion -> commit();
        } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
        }
        
        fclose($archivo);
    }
    insertSchool();
    insertDocType();
    insertStudent();
    insertTemporal();
?>
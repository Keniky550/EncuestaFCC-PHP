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
                $conexion -> exec("INSERT INTO student VALUES ('','$datos[0]','$datos[1]','$datos[2]','".addslashes($datos[3])."','".addslashes($datos[4])."','".addslashes($datos[5])."','$datos[6]')"); 
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
        //$sql = 'SELECT id_student FROM student';
        //$result = $conexion->query($sql);
        try {
            $conexion -> beginTransaction();
            //$dat = $kenneth -> consultar($sql);
            //$ids = null;

             while(($datos  = fgetcsv($archivo, 0, ","))== true){
                    $conexion -> exec("INSERT INTO temporal VALUES ('','$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]',null)");
                }
            
            $conexion -> commit();
        } catch (PDOException $e) {
            echo "ERROR: " .$e->getMessage();
        }
        
        fclose($archivo);
    }
    //insertSchool();
    //insertDocType();
    //insertStudent();
    insertTemporal();
?>
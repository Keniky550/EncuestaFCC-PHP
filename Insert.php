<?php
    require("db.php");
    $conexion = conection();

    $archivo = fopen("./datos/DOC_TYPE.csv", "r");
    $con = 0;

    try {
        $conexion -> beginTransaction();
        while(($datos  = fgetcsv($archivo, 0, ","))== true){
            $con++;
            $conexion -> exec("INSERT INTO school VALUES ('','$datos[0]')"); 
        }
        $conexion -> commit();
    } catch (PDOException $e) {
        echo "ERROR: " .$e->getMessage();
    }
    
    fclose($archivo);
?>
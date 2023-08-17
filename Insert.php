<?php
    require("db.php");
    $conexion = conection();

    $archivo = fopen("./datos/SCHOOL.csv", "r");
    $con = 0;

    while(($datos  = fgetcsv($archivo, 0, ","))== true){
        $con++;

        $sql = "INSERT INTO school VALUES ('','$datos[0]'";
        
        if($conexion->query($sql) === TRUE){
            echo "SE INSERTÓ CORRECTAMENTE";
        }
    }
?>
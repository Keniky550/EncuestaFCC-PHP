<?php
    require("db.php");
    $conexion = conection();

    $archivo = fopen("./datos/STUDENT.csv", "r");
    $con = 0;

    while(($datos  = fgetcsv($archivo, 0, ","))== true){
        $con++;

        $sql = "INSERT INTO STUDENT VALUES ('','$dato[0]','','$dato[1]','$dato[2]','$dato[3]','$dato[4]'),''";
        
        if($conexion->query($sql) === TRUE){
            echo "SE INSERTÓ CORRECTAMENTE";
        }
    }
?>
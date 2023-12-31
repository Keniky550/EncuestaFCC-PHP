<?php
    session_start();
    require_once('conn.php');
    $kenneth = new KEN();
    $cod = $_SESSION['usuario'];
    $sqlVerId = 'SELECT id_student FROM student WHERE cod = :cod';
    $valoresVerId = array(':cod' => $cod);
    $resultadoVerId = $kenneth->consultar($sqlVerId, $valoresVerId);

    if ($resultadoVerId) {
        $id = $resultadoVerId[0]['id_student'];
    

            $egre = $_POST['egreso'];
            $nom = $_POST['nom_promo'];
            $place = $_POST['lug_trabajo'];
            $desm = $_POST['desempeño'];
    
            $sql = 'UPDATE temporal SET grad_per = :egre, name_promo = :nom, work_place = :place, id_likert = :desm WHERE id_student = :id';
    
            $update = $kenneth->conection()->prepare($sql);
            $update->bindParam(':egre', $egre);
            $update->bindParam(':nom', $nom);
            $update->bindParam(':place', $place);
            $update->bindParam(':desm', $desm);
            $update->bindParam(':id', $id); 
    
            try {
                $update->execute();
                if ($update->execute()) {
                    $mostrarmodal = true;
                }
            } catch (PDOException $e) {
                echo "Hubo un problema al actualizar los datos: " . $e->getMessage();
                header('location: home.php');
            }
    }
?>

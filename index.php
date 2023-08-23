<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <style>
        <?php
            include_once __DIR__. '/css/style.css';
        ?>
    </style>
    <title>LoginFCC</title>
</head>
<?php
    require('conn.php');
    $kenneth = new KEN();
    $conexion = $kenneth -> conection();
    if (!$conexion){
        echo json_encode(['message' => 'failed to connect']);
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        $cod = $_POST['usuario'];
        $pass = $_POST['contraseña'];
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conexion->prepare("SELECT * FROM student WHERE cod = :cod and doc_num = :pass");
        $query->bindParam(":cod", $cod);
        $query->bindParam(":pass", $pass);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        if($usuario){
            $_SESSION['usuario'] = $cod;
            header('location:home.php');
            exit;
        } else {
           echo 'ERROR';
        }
}
?>
<body>
    <div class="register">
        <h2>Encuesta FCC</h2>
        <form action="index.php" method ="post">
            <div class="group">
                <div class="log">
                    <label id="login1" for="cod">Código:</label>
                    <input type="text" id="cod" name="usuario" size="8">
                </div>
                <div class="log">
                    <label id="login2" for="dni">Documento:</label>
                    <input type="password" id="dni" name="contraseña" size="8">
                </div>
            </div>
            <input class="log" type="submit" value="INGRESAR">
        </form>
    </div>
    <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
</body>
</html>
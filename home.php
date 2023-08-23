<?php
    session_start();
    require('conn.php');
    $kenneth = new KEN();
    $user = $_SESSION['usuario'];
    $sql = 'SELECT * FROM temporal INNER JOIN student ON temporal.id_student = student.id_student INNER JOIN school ON student.id_school = school.id_school and student.cod = :user';
    $valores = array(':user' => $user); 
    if(isset($sql)){
        $datos = $kenneth->consultar($sql, $valores);
        foreach ($datos as $dato){ 
            $codigo = $dato['cod'];
            $doc = $dato['doc_num'];
            $nombre = $dato['est_name'];
            $apep = $dato['paternal_surna'];
            $apem = $dato['maternal_surna'];
            $inst = $dato['inst_email'];
            $per = $dato['per_email'];
            $tel = $dato['phone_num'];
            $cel = $dato['cel_num'];
            $school = $dato['name_school'];
            $grad = $dato['grad_per'];
            $promo = $dato['name_promo'];
            $work = $dato['work_place'];
        }
    if(isset($_GET['upd'])){
        $id = $_GET['upd'];
    }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
            include_once __DIR__. '/css/registro.css';
        ?>
    </style>
    <title>RegistroFCC</title>
</head>
<body>
        <form class="cont">
            <h4>DATOS REGISTRADOS</h4>
            <div>
                <div class="underforms">
                    <section class="form">
                        <div class="container">
                            <label for="codigo">Código: </label>
                            <input type="text" id="codigo" name="codigo" size="10" value="<?php echo $codigo ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="dni">Número documento: </label>
                            <input type="text" id="dni" name="dni" size="10" value="<?php echo $doc ?>" disabled>
                        </div>
                    </section>
                    <section class="form">
                        <div class="container"> 
                            <label class="nom" for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" size="15" value="<?php echo $nombre ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="apellido_p">Apellido paterno: </label>
                            <input type="text" id="apellido_p" name="apellido_p" size="15" value="<?php echo $apep ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="apellido_m">Apellido materno: </label>
                            <input type="text" id="apellido_m" name="apellido_m" size="15" value="<?php echo $apem ?>" disabled>
                        </div>
                    </section>
                    <section class="form">
                        <div class="container">
                            <label for="correo_inst">Correo institucional: </label>
                            <input type="email" id="correo_inst" name="correo_inst" size="30" value="<?php echo $inst ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="correo_per">Correo personal: </label>
                            <input type="email" id="correo_per" name="correo_per" size="30" value="<?php echo $per ?>" disabled>
                        </div>
                    </section>
                    <section class="form">
                        <div class="container">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" size="10" value="<?php echo $tel ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="celular">Celular:</label>
                            <input type="text" id="telefono" name="telefono" size="10" value="<?php echo $cel ?>" disabled>
                        </div>
                        <div class="container">
                            <label for="escuela">Escuela:</label>
                            <input type="text" id="escuela" name="escuela" size="10" value="<?php echo $school ?>" disabled>
                        </div>
                    </section>
                </div>
                <p>Si desea corregir sus datos, enviar correo a: informatica.fcc@unmsm.edu.pe</p>
            </div>
        </form>
        <form class="cont" action="upd.php" method="post" autocomplete="off">
            <h4>REGISTRO DE DATOS</h4>
            <div class="box">
                <label class="reg" id="lab1" for="egreso">Periodo de egreso (xxxx-x):</label>
                <input class="reg" type="text" id="egreso" name="egreso" size="10" value="<?php $grad ?>">
                <label class="reg" id="lab2" for="nom_promo">Nombre de promoción:</label>
                <input class="reg" type="text" id="nom_promo" name="nom_promo" size="20" value="<?php $promo ?>">
                <label class="reg" id="lab3" for="lug_trabajo">Centro de trabajo:</label>
                <input class="reg" id="in3" type="text" id="lug_trabajo" name="lug_trabajo" size="20" value="<?php $work ?>">
            </div>
            <div class="lik">
                <p>Desempeño profesional satisfactorio</p>
                <div class="likert">
                    <div class="val">
                        <input type="radio" id="1" name="desempeño" value="1">
                        <label for="1">Totalmente en desacuerdo</label>
                    </div>
                    <div class="val">
                        <input type="radio" id="2" name="desempeño" value="2">
                        <label for="2">En desacuerdo</label>
                    </div>
                    <div class="val">
                        <input type="radio" id="3" name="desempeño" value="3">
                        <label for="3">Ni de acuerdo ni en desacuerdo</label>
                    </div>
                    <div class="val">
                        <input type="radio" id="4" name="desempeño" value="4">
                        <label for="4">De acuerdo</label>
                    </div>
                    <div class="val">
                        <input type="radio" id="5" name="desempeño" value="5">
                        <label for="5">Totalmente de acuerdo</label>
                    </div>
                </div>
            </div>
            <input class="enviar" type="submit" value="Enviar">
        </form>
</body>
</html>
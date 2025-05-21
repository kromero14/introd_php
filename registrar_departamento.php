<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Departamento</title>
</head>
<body>
    <h1>Registrar Departamento</h1>
    <?php
       echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un empleado-->
    <h2>Empleado</h2>
    <form action="modelo/reg_departamento.php" method = "post">
        <label for="">Código departamento:</label>
        <input type="text" name="id_departamento" id="" required>
        <br><br>
        <label for="">Nombre departamento:</label>
        <input type="text" name="nombre_departamento" id="" required>
        <br><br>
        <label for="">Presupuesto Departamento:</label>
        <input type="text" name="presupuesto_departamento" id="" required>
        <br><br>
        <button type="submit">Ingresar</button>
        <br><br>
    </form>
</body>
</html>
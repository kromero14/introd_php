<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

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
    <title>Consulta empleados</title>
</head>
<body>
    <h1>Consulta empleados</h1>
    
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Mostrar consulta-->
    <?php
        if(isset($_SESSION['username']))
        {
            $query = "Select Empleado.id_empleado, Empleado.nombre_empleado, Empleado.apellidos_empleado, Departamento.nombre_departamento FROM Empleado JOIN Departamento ON Empleado.id_departamento= Departamento.id_departamento ";
            $resultado = mysqli_query($conexion, $query) or trigger_error("Error en la consulta : ".mysqli_error($conexion));

            //Encabezado de la tabla de resultados
            echo "<table border = '1' align = 'center'>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellidos</th>";
                echo "<th>Departamento</th>";
            echo "</tr>";

            //Filas de la tabla, traidos de la consulta a la BD
            while($fila = mysqli_fetch_array($resultado))
            {
                echo "<tr>";
                    echo "<td>";
                        echo $fila['id_empleado'];
                    echo "</td>";
                    echo "<td>";
                        echo $fila['nombre_empleado'];
                    echo "</td>";
                    echo "<td>";
                        echo $fila['apellidos_empleado'];
                    echo "</td>";
                    echo "<td>";
                        echo $fila['nombre_departamento'];
                    echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

        }
        else
        {
            header('location: ../index.php');
        }
            
    ?>
</body>
</html>
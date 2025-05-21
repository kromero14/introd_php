<?php
require 'conexion.php';

if (isset($_GET['id_empleado'])) 
{
    $id = $_GET['id_empleado'];

    $query = "SELECT Empleado.id_empleado, Empleado.nombre_empleado, Empleado.apellidos_empleado, Departamento.nombre_departamento
              FROM Empleado 
              JOIN Departamento  ON Empleado.id_departamento = Departamento.id_departamento
              WHERE Empleado.id_empleado = ?";
        echo "<table border = '1' align = 'center'>";
        echo "<tr>";
    $stmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<table border = '1' align = 'center'>";
        echo "<tr>";
        echo "ID: " . $fila['id_empleado'] . "<br>";
        echo "Nombre: " . $fila['nombre_empleado'] . "<br>";
        echo "Apellidos: " . $fila['apellidos_empleado'] . "<br>";
        echo "Departamento: " . $fila['nombre_departamento'] . "<br>";
        echo "</tr>";
        echo "</table>";
    } else {
        echo "Empleado no encontrado.";
    }
} else {
    echo "No se ha enviado un ID.";
}
?>
<?php

    // script para crear una conexion con la BD

    // parametros requeridos para la conexion con la BD

    // parametros BD local
    /*DEFINE("USER", "root"); // se crea la constante user con valor "root"
    DEFINE("PW", "");
    DEFINE("HOST", "localhost");
    DEFINE("BD", "Empresa");*/

    // Parametros BD remota (infinityfree.com)
    DEFINE("USER", "if0_38542099"); // se crea la constante user con valor "if0_38542099"
    DEFINE("PW", "keiner2009");
    DEFINE("HOST", "sql200.infinityfree.com");
    DEFINE("BD", "if0_38542099_empresa");

    // Conexion con la BD
    $conexion=mysqli_connect(HOST, USER, PW, BD);

    // Establecer conjunto de caracteres para el hosting
    mysqli_set_charset($conexion, "utf8mb4");

    // Verificar la conexion con la BD
    if(!$conexion)
    {
        die("La conexion con la BD falló: " + mysqli_error($conexion));
        exit();
    }
    /*else
    {
        die("Conexion exitosa a la BD!");
    }*/

?>
<?php
   require 'conexion.php';
   
   // Iniciar sesion para guardar los datos de usuario
   session_start();

   $usuario = $_POST['email'];
   $password = $_POST['password'];

   $query1 = "SELECT email, COUNT(*) AS contar FROM Usuario WHERE email = '$usuario' AND password = '$password'"; 

   $consulta = mysqli_query($conexion, $query1) or trigger_error("error en la consulta MySQL: " + mysqli_error($conexion));

   $resultado = mysqli_fetch_array($consulta);

   if($resultado['contar']>0)
   {
      $_SESSION['username'] = $usuario;
      // REdirigir el usuario a la pagina
      header("location: ../pagina_usuario.php");

      /*echo "el usuario existe en la BD<br>";
      echo $resultado ['email'];*/
   }
   else 
   {
      echo "el usuario no existe, o usuario o contraseña incorrecta";
   }

?>
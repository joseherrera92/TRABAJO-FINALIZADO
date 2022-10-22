<?php

include "conexion.php";
session_start();

if (isset($_GET["verificar"])) {

    $nombre = $_GET["name"];
    $usuario = $_GET["nombre"];
    $contrasena = $_GET["contra"];
    $id = $_GET["id"];
    $rol = $_GET["rol"];



    $consulta = "INSERT INTO `usuario` (`id`, `nombre`, `usuario`, `contrasena`, `idRol`) 
        VALUES ('$id', '$nombre', '$usuario', '$contrasena', '$rol')";

    $resultado = $con->prepare($consulta);    

    if ($resultado->execute()) {
        echo "
          <script>
          alert('Usuario registrado con exito');
          </script>            
         ";
    
        header('Location: inicio.php');
      } else {
        echo "
          <script>
          alert('Despeguela ome anorí');
          </script>            
         ";
      }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DON BANANO</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="inactive underlineHover"><a href="./inicio.php">Sign In</a> </h2>
            <h2 class="active">Sign Up</h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="image/logo.jpg" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form action="registro.php" method="$_GET">
                <input type="text" id="id" class="fadeIn third" name="id" placeholder="id" require>
                <input type="text" id="login" class="fadeIn second" name="nombre" placeholder="login" require>
                <input type="text" id="nombre" class="fadeIn second" name="name" placeholder="nombre" require>
                <input type="password" id="password" class="fadeIn third" name="contra" placeholder="password" require>
                <div class="content-select">
                    <select id="rol" name="rol" require>
                        <option value="3">Cliente</option>
                        <option value="2">Trabajador</option>
                    </select>
                    <i></i>
                </div>
                <input type="submit" class="fadeIn fourth" value="Sign In" name="verificar">

            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>
<?php include "./Cabeza/footer.php";?>
</html>